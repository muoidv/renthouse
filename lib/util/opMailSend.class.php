<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opMailSend
 *
 * @package    OpenPNE
 * @subpackage util
 * @author     Kousuke Ebihara <ebihara@php.net>
 */
class opMailSend
{
  public $subject = '';
  public $body = '';
  static protected $initialized = false;

  public static function initialize()
  {
    if (!self::$initialized)
    {
      opApplicationConfiguration::registerZend();

      if ($host = sfConfig::get('op_mail_smtp_host'))
      {
        $tr = new Zend_Mail_Transport_Smtp($host, sfConfig::get('op_mail_smtp_config', array()));
        Zend_Mail::setDefaultTransport($tr);
      }
      elseif ($envelopeFrom = sfConfig::get('op_mail_envelope_from'))
      {
        $tr = new Zend_Mail_Transport_Sendmail('-f'.$envelopeFrom);
        Zend_Mail::setDefaultTransport($tr);
      }

      opApplicationConfiguration::unregisterZend();

      self::$initialized = true;
    }
  }

  public function setSubject($subject)
  {
    $this->subject = $subject;
  }

  public function setTemplate($template, $params = array())
  {
    $body = $this->getCurrentAction()->getPartial($template, $params);
    $this->body = $body;
  }

  public function setGlobalTemplate($template, $params = array())
  {
    $template = '_'.$template;
    $view = new opGlobalPartialView(sfContext::getInstance(), 'superGlobal', $template, '');
    $view->getAttributeHolder()->setEscaping(false);
    $view->setPartialVars($params );
    $body = $view->render();
    $this->body = $body;
  }

  public function send($to, $from)
  {
    return self::execute($this->subject, $to, $from, $this->body);
  }

  public static function getMailTemplate($template, $target = 'pc', $params = array(), $isOptional = true, $context = null)
  {
    if (!$context)
    {
      $context = sfContext::getInstance();
    }

    $params['sf_config'] = sfConfig::getAll();
   

    $view = new sfTemplatingComponentPartialView($context, 'superGlobal', 'notify_mail:'.$target.'_'.$template, '');
    $context->set('view_instance', $view);

    $view->getAttributeHolder()->setEscaping(false);
    $view->setPartialVars($params);
    $view->setAttribute('renderer_config', array('twig' => 'opTemplateRendererTwig'));
    $view->setAttribute('rule_config', array('notify_mail' => array(
      array('loader' => 'sfTemplateSwitchableLoaderDoctrine', 'renderer' => 'twig', 'model' => 'NotificationMail'),
      array('loader' => 'opNotificationMailTemplateLoaderConfigSample', 'renderer' => 'twig'),
      array('loader' => 'opNotificationMailTemplateLoaderFilesystem', 'renderer' => 'php'),
    )));
    $view->execute();

    try
    {
      return $view->render();
    }
    catch (InvalidArgumentException $e)
    {
      if ($isOptional)
      {
        return '';
      }

      throw $e;
    }
  }

  public static function sendTemplateMail($template, $to, $from, $params = array(), $context = null)
  {
    if (!$to)
    {
      return false;
    }

    if (empty($params['target']))
    {
      $target = opToolkit::isMobileEmailAddress($to) ? 'mobile' : 'pc';
    }
    else
    {
      $target = $params['target'];
    }

    if (in_array($target.'_'.$template, Doctrine::getTable('NotificationMail')->getDisabledNotificationNames()))
    {
      return false;
    }

    if (null === $context)
    {
      $context = sfContext::getInstance();
    }

    $body      = self::getMailTemplate($template, $target, $params, false, $context);
    $signature = self::getMailTemplate('signature', $target, array(), true, $context);
    if ($signature)
    {
      $signature = "\n".$signature;
    }

    $subject = $params['subject'];
    $notificationMail = Doctrine::getTable('NotificationMail')->fetchTemplate($target.'_'.$template);
    if (($notificationMail instanceof NotificationMail) && $notificationMail->getTitle())
    {
      $subject = $notificationMail->getTitle();
      $templateStorage = new sfTemplateStorageString($subject);
      $renderer = new opTemplateRendererTwig();
      $params['sf_type'] = null;
      $parameterHolder = new sfViewParameterHolder($context->getEventDispatcher(), $params);
      $subject = $renderer->evaluate($templateStorage, $parameterHolder->toArray());
      $notificationMail->free(true);
    }

    return self::execute($subject, $to, $from, $body.$signature);
  }

  public static function execute($subject, $to, $from, $body)
  {
    if (!$to)
    {
      return false;
    } 

    //$subject = mb_convert_kana($subject, 'KV');
    /**
     * Send mail by php mailer
     * 
     * @author thuclh
     */
    include "class.phpmailer.php";
    include "class.smtp.php";
    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->SMTPDebug = 1;
//    $mail->Host = "smtp.gmail.com"; // specify main and backup server
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; // set the port to use
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->SMTPSecure = 'ssl';
    $mail->Username = "muoi.dvm@gmail.com"; // your SMTP username or your gmail username
    $mail->Password = "nhung213586"; // your SMTP password or your gmail password
    $name=$to; // Recipient's name
    $mail->From = $from;
    $mail->FromName = "Map Of the Life"; // Name to indicate where the email came from when the recepient received
    $mail->AddAddress($to,$name);
    $mail->AddReplyTo($from,"Map Of the Life");
    $mail->WordWrap = 50; // set word wrap
    $mail->CharSet="utf-8";
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = $subject;
    $mail->Body = $body; //HTML Body
    $mail->AltBody = $body; //Text Body

    return $mail->Send();
  }

 /**
  * Gets the current action instance.
  *
  * @return sfAction
  */
  protected function getCurrentAction()
  {
    return sfContext::getInstance()->getController()->getActionStack()->getLastEntry()->getActionInstance();
  }
}

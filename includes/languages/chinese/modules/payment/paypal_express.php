<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_PAYPAL_EXPRESS_TEXT_TITLE', 'PayPal快速结帐');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_TEXT_PUBLIC_TITLE', '贝宝（包括信用卡和借记卡）');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_TEXT_DESCRIPTION', '<img src="images/icon_info.gif" border="0" />&nbsp;<a href="http://library.oscommerce.com/Package&en&paypal&oscom23&express_checkout" target="_blank" style="text-decoration: underline; font-weight: bold;">查看在线文档</a><br /><br /><img src="images/icon_popup.gif" border="0" />&nbsp;<a href="https://www.paypal.com" target="_blank" style="text-decoration: underline; font-weight: bold;">访问贝宝网站</a>');

  define('MODULE_PAYMENT_PAYPAL_EXPRESS_ERROR_ADMIN_CURL', '该模块需要卷曲在PHP中启用，并不会加载，直到它已经在这个网络服务器启用。');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_ERROR_ADMIN_CONFIGURATION', '该模块将不会加载，直到卖方户口或API凭证参数配置。请编辑和配置该模块的设置。');

  define('MODULE_PAYMENT_PAYPAL_EXPRESS_TEXT_BUTTON', '退房贝宝');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_TEXT_COMMENTS', '评论：');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_EMAIL_PASSWORD', '帐户已自动为您创建了以下的电子邮件地址和密码：' . "\n\n" . '记住我的帐号电子邮件地址： %s' . "\n" . '记住我的帐号密码： %s' . "\n\n");

//  define('MODULE_PAYMENT_PAYPAL_EXPRESS_BUTTON', 'https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_BUTTON', ' https://www.paypal.com/zh_CN/CN/i/btn/btn_xpressCheckout.gif'); 
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_LANGUAGE_LOCALE', 'zh_CN');

  define('MODULE_PAYMENT_PAYPAL_EXPRESS_DIALOG_CONNECTION_LINK_TITLE', '测试API服务器连接');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_DIALOG_CONNECTION_TITLE', 'API服务器连接测试');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_DIALOG_CONNECTION_GENERAL_TEXT', '测试连接到服务器..');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_DIALOG_CONNECTION_BUTTON_CLOSE', '关闭');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_DIALOG_CONNECTION_TIME', '连接时间：');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_DIALOG_CONNECTION_SUCCESS', '成功！');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_DIALOG_CONNECTION_FAILED', '失败！请检查验证SSL证书设置，然后再试一次。');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_DIALOG_CONNECTION_ERROR', '发生错误。请刷新页面，检查您的设置，然后再试一次。');

  define('MODULE_PAYMENT_PAYPAL_EXPRESS_ERROR_NO_SHIPPING_AVAILABLE_TO_SHIPPING_ADDRESS', '航运是目前不适用于选定的送货地址。请选择或创建一个新的送货地址与您的购买使用。');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_WARNING_LOCAL_LOGIN_REQUIRED', '请登录您的帐户验证顺序。');
  define('MODULE_PAYMENT_PAYPAL_EXPRESS_NOTICE_CHECKOUT_CONFIRMATION', '请检查并确认以下的订单。您的订单将不会被处理，直到它得到了证实。');
?>

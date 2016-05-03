<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
define('NAVBAR_TITLE_1', '登录');
define('NAVBAR_TITLE_2', '忘记密码');
define('HEADING_TITLE', '我忘记密码了！');
define('TEXT_MAIN', '如果你\'已经忘记了自己的密码，请输入您的E-mail地址，我们\'会送你如何安全地修改您的密码的说明。');

define('TEXT_PASSWORD_RESET_INITIATED', '请检查您的E-mail的教学中NS如何更改您的密码。该指令包含一个链接，是有效的仅24小时或直到您的密码已被更新。');
define('TEXT_NO_EMAIL_ADDRESS_FOUND', '错误：电子邮件地址未找到我Ñ我们的记录，请重试。');

define('EMAIL_PASSWORD_RESET_SUBJECT', STORE_NAME . ' - 新密码');
define('EMAIL_PASSWORD_RESET_BODY', '新密码已被要求为您的帐户 ' . STORE_NAME . '.' . "\n\n" . '请点击此个人链接安全地修改您的密码：' . "\n\n" . '%s' . "\n\n" . '此链接将在24小时后会自动丢弃或密码之后已经改变。' .  "\n\n" . '对于帮助我们的任何在线服务，请发送电子邮件至商店老板： ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");

define('ERROR_ACTION_RECORDER', '错误：密码重置链接已发送，请在 %s 后再试一次。');
?>

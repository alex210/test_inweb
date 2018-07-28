<?php
use keltstr\simplehtmldom\SimpleHTMLDom as SHD;

function get_content($url){
  $ch = curl_init($url);
	curl_setopt($ch, CURLOPT_PROXY, "37.187.110.165:8080");
  curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__ . '/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__ . '/cookie.txt');
  $res = curl_exec($ch);
  curl_close($ch);
  return $res;
}

function get_auth($url_auth, $data = []){
  $ch = curl_init($url_auth);
  curl_setopt($ch, CURLOPT_PROXY, "37.187.110.165:8080");
  curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Linux; U; Android 4.0.3; ko-kr; LG-L160L Build/IML74K) AppleWebkit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30");
  curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__ . '/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__ . '/cookie.txt');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  $res = curl_exec($ch);
  curl_close($ch);
  return $res;
}

$url_auth = 'https://auth.mail.ru/cgi-bin/auth?from=splash_touch';
$url = 'https://m.mail.ru/messages/';
$auth_data = [
  'new_auth_form' => '1',
  'Login' => 'sdfvcxvzxv',
  'Domain' => 'mail.ru',
  'Password' => 'gdf5641fdsg4165',
  'saveauth' => '1',
];

$data = get_auth($url_auth, $auth_data);
$html = get_content($url);

$html = SHD::str_get_html($html);
$subjects = $html->find('.messageline__subject');
?>

<div class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-1 control-label">Email:</label>
    <div class="col-sm-2">
      <p class="form-control-static">sdfvcxvzxv@mail.ru</p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-1 control-label">Пароль:</label>
    <div class="col-sm-2">
      <p class="form-control-static">gdf5641fdsg4165</p>
    </div>
  </div>
  <a href="https://github.com/alex210/test_inweb/blob/master/frontend/views/site/mail/mail.php" target="_blank">Код страницы на GitHub</a>
</div>

<div class="page-header">
  <h2>Список писем:</h2>
</div>
<ul class="list-group">
<?php foreach ($subjects as $subject) { ?>
  <li class="list-group-item"><?=$subject->plaintext ?></li>
<?php } ?>
</ul>
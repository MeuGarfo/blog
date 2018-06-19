<div class="r">
    <div class="g3"></div>
    <div class="g3">
        <h2>Login</h2>
        <?php
        if (isset($error)) {
            print '<p id="error"><b>Erro:</b> Dados incorretos</p>';
        }
        ?>
        <form class="" action="/signin" method="post">
            <label for="email">
                <?php
                if (isset($error)) {
                    print '<span style="color:red">Email</span>';
                } else {
                    print 'Email';
                }
                ?>
            </label>
            <input class="input-block" type="email" name="email" id="email" required>
            <label for="password">
                <?php
                if (isset($error)) {
                    print '<span style="color:red">Senha</span>';
                } else {
                    print 'Senha';
                }
                ?>
            </label>
            <input  class="input-block" type="password" name="password" id="password" required pattern=".{8,}" title="8 caracteres no mínimo">
            <button type="submit">Entrar</button>
            <script type="text/javascript">
            /*FUNCTIONs*/
            function defaultLabel(){
                $("label[for='email']").html('Email');
                $("label[for='password']").html('Senha');
                $("#error").hide();
            }
            /*TRIGGERs*/
            $('#email').on('focus',function(){
                defaultLabel();
            });
            $('#password').on('focus',function(){
                defaultLabel();
            });
            </script>
        </form>
    </div>
    <div class="g3"></div>
</div>
<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(["setCookieDomain", "*.hackergaucho.com.br"]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//piwik.mushape.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

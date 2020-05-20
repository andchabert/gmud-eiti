<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

define('DOMAIN_FQDN', 'eitisolucoes.local');
define('LDAP_SERVER', '10.168.12.194');

if (isset($_POST['submit']))
{
    $user = strip_tags($_POST['username']) .'@'. DOMAIN_FQDN;
    $pass = stripslashes($_POST['password']);

    $conn = ldap_connect("ldap://". LDAP_SERVER ."/");

    if (!$conn)
        $err = 'Could not connect to LDAP server';

    else
    {
        define('LDAP_OPT_DIAGNOSTIC_MESSAGE', 0x0032);

        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);

        $bind = @ldap_bind($conn, $user, $pass);

        ldap_get_option($conn, LDAP_OPT_DIAGNOSTIC_MESSAGE, $extended_error);

        if (!empty($extended_error))
        {
            $errno = explode(',', $extended_error);
            $errno = $errno[2];
            $errno = explode(' ', $errno);
            $errno = $errno[2];
            $errno = intval($errno);

            if ($errno == 532)
                $err = 'Unable to login: Password expired';
        }

        elseif ($bind)
        {
            $base_dn = array("CN=Users,DC=". join(',DC=', explode('.', DOMAIN_FQDN)), 
                "OU=Users,OU=People,DC=". join(',DC=', explode('.', DOMAIN_FQDN)));

            $result = ldap_search(array($conn,$conn), $base_dn, "(cn=*)");

            if (!count($result))
                $err = 'Unable to login: '. ldap_error($conn);

            else
            {
                foreach ($result as $res)
                {
                    $info = ldap_get_entries($conn, $res);

                    for ($i = 0; $i < $info['count']; $i++)
                    {
                        if (isset($info[$i]['userprincipalname']) AND strtolower($info[$i]['userprincipalname'][0]) == strtolower($user))
                        {
                            session_start();

                            $username = explode('@', $user);
                            $_SESSION['foo'] = 'bar';

                            // set session variables...

                            break;
                        }
                    }
                }
            }
        }
    }

    // session OK, redirect to home page
    if (isset($_SESSION['foo']))
    {
        header('Location: /');
        exit();
    }

    elseif (!isset($err)) $err = 'Unable to login: '. ldap_error($conn);

    ldap_close($conn);
}
?>
<!DOCTYPE html><head><title>Login</title></head>
<style>
* { font-family: Calibri, Tahoma, Arial, sans-serif; }
.errmsg { color: red; }
#loginbox { font-size: 12px; }
</style>
<body>
<div align="center"><img id="imghdr" src="/img/logo.png" height="100" /><br><br><h2>Login</h2><br><br>

<div style="margin:10px 0;"></div>
<div title="Login" style="width:400px" id="loginbox">
    <div style="padding:10px 0 10px 60px">
    <form action="testead.php" id="login" method="post">
        <table><?php if (isset($err)) echo '<tr><td colspan="2" class="errmsg">'. $err .'</td></tr>'; ?>
            <tr>
                <td>Login:</td>
                <td><input type="text" name="username" style="border: 1px solid #ccc;" autocomplete="off"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" style="border: 1px solid #ccc;" autocomplete="off"/></td>
            </tr>
        </table>
        <input class="button" type="submit" name="submit" value="Login" />
    </form>
    </div>
</div>
</div>
</body></html>
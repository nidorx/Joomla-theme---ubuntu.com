<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" >
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>by(){ Developers; }</title>
        <link rel="stylesheet" href="/templates/ubuntutheme/css/960_12grid.css" type="text/css" />
        <link rel="stylesheet" href="/templates/ubuntutheme/css/text.css" type="text/css" />
        <link rel="stylesheet" href="/templates/ubuntutheme/css/style.css" type="text/css" />
        <link rel="stylesheet" href="/templates/ubuntutheme/css/header.css" type="text/css" />
        <link rel="stylesheet" href="/templates/ubuntutheme/css/content.css" type="text/css" />
        <link rel="stylesheet" href="/templates/ubuntutheme/css/forms.css" type="text/css" />
        <link rel="stylesheet" href="/templates/ubuntutheme/css/offline.css" type="text/css" />
    </head>

    <body class="home com_content frontpage">
        <div id="wrapper">
            <div id="top-surround">
                <div id="header">
                    <div class="container">
                        <div class="grid_12 last">
                            <div id="header-b"><div class="module standard">
                                    <div class="logo">
                                        <div class="block">
                                            <div class="module-content">
                                                <p><a id="logo" href="http://ubuntutheme.com.br" title="Home" rel="home"> http://ubuntutheme.com.br </a></p>                    </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <div id="body-surround">
                <div class="container">
                    <div id="body-bg" class="header-full footer-full">
                        <div id="body-bg2">
                            <div id="body-bg3">
                                <div id="body-bg4">
                                    <div id="main">
                                        <div class="container">
                                            <div id="content-container" class=" grid_12 ">
                                                <div class="block">                      
                                                    <div id="mainbody">
                                                        <div class="joomla ">
                                                            <h1 class="pagetitle">
                                                                <?php echo $mainframe->getCfg('sitename'); ?>
                                                            </h1>
                                                            <div class="blog">
                                                                <div class="leading-articles">
                                                                    <div class="article ">
                                                                        <div class="article-bg">
                                                                            <div class="article-content">
                                                                                <jdoc:include type="message" />
                                                                                <div id="frame" class="outline">

                                                                                    <p>
                                                                                        <?php echo $mainframe->getCfg('offline_message'); ?>
                                                                                    </p>
                                                                                    <?php if (JPluginHelper::isEnabled('authentication', 'openid')) : ?>
                                                                                        <?php JHTML::_('script', 'openid.js'); ?>
                                                                                    <?php endif; ?>
                                                                                    <form action="index.php" method="post" name="login" id="form-login">
                                                                                        <fieldset class="input">
                                                                                            <p id="form-login-username">
                                                                                                <label for="username"><?php echo JText::_('Username') ?></label><br />
                                                                                                <input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('Username') ?>" size="18" />
                                                                                            </p>
                                                                                            <p id="form-login-password">
                                                                                                <label for="passwd"><?php echo JText::_('Password') ?></label><br />
                                                                                                <input type="password" name="passwd" class="inputbox" size="18" alt="<?php echo JText::_('Password') ?>" id="passwd" />
                                                                                            </p>
                                                                                            <p id="form-login-remember">
                                                                                                <label for="remember"><?php echo JText::_('Remember me') ?></label>
                                                                                                <input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('Remember me') ?>" id="remember" />
                                                                                            </p>
                                                                                            <input type="submit" name="Submit" class="button" value="<?php echo JText::_('LOGIN') ?>" />
                                                                                        </fieldset>
                                                                                        <input type="hidden" name="option" value="com_user" />
                                                                                        <input type="hidden" name="task" value="login" />
                                                                                        <input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
                                                                                        <?php echo JHTML::_('form.token'); ?>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            <div class="clear"></div>
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>                                                                
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


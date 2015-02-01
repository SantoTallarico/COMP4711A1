<?php

/*
 * Comments and stuff
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{siteTitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <a class="logo" href="/homepage"><img src="logo.png"/></a>
                 <form action="results">
                    Search: <input type="text"/><br>
                    <input type="submit" value="Submit"/>
                </form> 
            </div>
            <div id="content">
                <h1>{pageTitle}</h1>
                {content}
            </div>
            <div id="footer">
                Kappa Industries
            </div>
        </div>
    </body>
</html>
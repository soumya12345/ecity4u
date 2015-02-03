<?php
$connect=mysql_connect("localhost","root", "") or die("Unable to connect to database server.");

// Select the database we want
mysql_select_db("ecity4u_ecity") or die("Unable to select development database");

session_start();
function chk_login(){
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
}

function agent_chk_login(){
    if(!isset($_SESSION['agentname']))
    {
        header("location:index.php");
    }
}

function strip_html_tags( $text )
{
    $text = preg_replace(
        array(
          // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu'
        ),
        array(
            '', '', '', '', '', '', '', '', ''), $text );
      
    return strip_tags( $text);
}

function make_safe($variable) {
    $variable = strip_html_tags($variable);
	$bad = array("=","<", ">", "/","\"","`","~","'","$","%","#");
	$variable = str_replace($bad, "", $variable);
    $variable = mysql_real_escape_string(trim($variable));
    return $variable;
}

function categoryname($catid)
{
    $qwe=mysql_query("select * from `category` where `id`='$catid'")or die(mysql_error());
    $res=mysql_fetch_array($qwe);
    return $res['category'];
}

function subcategoryname($scatid)
{
    $qwe=mysql_query("select * from `subcategory` where `id`='$scatid'")or die(mysql_error());
    $res=mysql_fetch_array($qwe);
    return $res['subcategory'];
}
function subsubcategoryname($sscatid)
{
    $qwe=mysql_query("select * from `subsubcategory` where `id`='$sscatid'")or die(mysql_error());
    $res=mysql_fetch_array($qwe);
    return $res['subsubcategory'];
}
function getagentname($slno)
{
    $qwe=mysql_query("select `name` from `user` where `id`='$slno'")or die(mysql_error());
    $res=mysql_fetch_array($qwe);
    return $res['name'];
}
function cityname($cityid)
{
    $qwery=mysql_query("select `cityname` from `city` where `id`='$cityid'")or die(mysql_error());
    $res=mysql_fetch_array($qwery);
    return $res['cityname'];
}
?>
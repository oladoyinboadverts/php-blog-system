<?php 

//the CMS header title and meta tags generator (Created By wildf-oster.h)

echo '<!DOCTYPE html>
<lang="en">
<head>
<meta name="viewport" content="width:device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
<meta charset="UTF-8">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://rawcdn.githack.com/hung1001/font-awesome-pro-v6/44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
<link href="frontend/all.min.css" rel="stylesheet" type="text/css" />
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>


';

$url = $_SERVER['PHP_SELF'];
$url = basename($url, ".php");

if($url == "view-blog"){
$id = $_GET['id'];
$row1 = "SELECT * FROM `posts` WHERE `id` = $id";
$query = mysqli_query($connect, $row1);
if(mysqli_num_rows($query) == 0){ $ptitle = "404"; } else { 
$row4 = mysqli_fetch_assoc($query);

$ptitle = $row4['name'];

if(empty($row4['metatitle'])){
	
$metaname = $ptitle;

}else{
	$metaname = $row4['metatitle'];
}

$metadesc = $row4['metadesc'];
$metatags = $row4['metatags'];
$image = $row4['image'];
$date1 = $row4['date'];
$date = date("Y-m-d h:i:s+0100", $date1);
$cat = $row4['category'];

$sql = "SELECT * FROM `settings`";
$query = mysqli_query($connect, $sql);
$mrow = mysqli_fetch_assoc($query);
$sitename = $mrow['homepage'];
$sep = $mrow['sep'];
$desc = $mrow['metadesc'];
$metauser = $mrow['metauser'];
$siteurl = $mrow['siteurl'];
$imagedir = $mrow['imagedir'];
$posturl = "http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$metaimage = $imagedir.$image;



printf("<title>%s %s %s</title>", $ptitle, $sep, $sitename);

printf('
<meta name="title" content="%s">
<meta name="description" content="%s">
<meta name="author" content="%s">
<meta name="keyword" content="%s">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="Article">
<meta property="og:url" content="'.$siteurl.'">
<meta property="og:title" content="%s">
<meta property="og:description" content="%s">
<meta property="og:image" content="'.$imagedir.''.$image.'">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="'.$sitename.'">
<meta property="twitter:title" content="%s">
<meta property="twitter:description" content="%s">
<meta property="twitter:image" content="'.$imagedir.$image.'">

<meta name="robots" content="index,follow">
<meta property="og:site_name" content="%s"/>
<meta property="article:publisher" content="https://www.facebook.com/spakmedia"/>
<meta property="og:locale" content="en_EN" />
<meta property="og:updated_time" content="%s" />
<meta property="article:modified_time" content="%s" />
<meta property="article:section" content="%s" />
<meta property="article:author" content="%s" />
<meta content="global" name="distribution" />
<meta content="1 days" name="revisit" />
<meta content="1 days" name="revisit-after" />
<meta name="serp-rank" position="1" />
<meta content="document" name="resource-type" />
<meta content="all" name="audience" />
<meta content="global" name="target" />
<meta content="all" name="robots" />
<meta content="index, follow" name="robots" />
<meta content="all" name="googlebot" />
<meta content="index, follow" name="GOOGLEBOT" />
<meta content="index, follow" name="yahooBOT" />
<meta content="all" name="msnbot" />
<meta content="all" name="Googlebot-Image" /> 
<meta content="all" name="WEBCRAWLERS" />
<meta content="en-us" name="language" />
<meta content="en-us" http-equiv="content-language" />
<meta content="oladoyinbov@gmail.com" name="email" />

', $metaname, $metadesc, $metauser, $metatags, $metaname, $metadesc, $metaname, $metadesc, $sitename, $date, $date, $cat, $metauser);

printf('<script type="application/ld+json">
	  {
     "@context": "http://schema.org",
     "@type": "NewsArticle",
     "mainEntityOfPage":{
       "@type":"WebPage",
       "@id":"%s"
     },
     "headline": "%s",
	 "description": "",
	  "datePublished": "%s",
     "dateModified": "%s",
     "image": {
       "@type": "ImageObject",
       "url": "%s",
       "height": 422,
       "width": 661     },
     "author": {
       "@type": "Person",
       "name": "Wildfoster"
     },
     "publisher": {
       "@type": "Organization",
       "name": "%s",
       "logo": {
         "@type": "ImageObject",
         "url": "%s",
         "width": 109,
         "height": 60
       }
     }
    }
</script>', $posturl, $ptitle, $date, $date, $metaimage, $sitename, $metaimage);


}
}
elseif ($url == "index"){
	$sql = "SELECT * FROM `settings`";
$query = mysqli_query($connect, $sql);
$mrow = mysqli_fetch_assoc($query);
$sitename = $mrow['homepage'];
$sep = $mrow['sep'];
$desc = $mrow['metadesc'];
$metauser = $mrow['metauser'];
$metatags = $mrow['metatags'];
$siteurl = $mrow['siteurl'];
$date = date("Y-m-d h:i:s+01:00");

printf('
<title>%s</title>
<meta name="description" content="%s">
<meta name="keyword" content="%s">
<meta content="global" name="distribution" />
<meta content="1 days" name="revisit" />
<meta content="1 days" name="revisit-after" />
<meta name="serp-rank" position="1" />
<meta content="document" name="resource-type" />
<meta content="all" name="audience" />
<meta content="global" name="target" />
<meta content="all" name="robots" />
<meta content="index, follow" name="robots" />
<meta content="all" name="googlebot" />
<meta content="index, follow" name="GOOGLEBOT" />
<meta content="index, follow" name="yahooBOT" />
<meta content="all" name="msnbot" />
<meta content="all" name="Googlebot-Image" /> 
<meta content="all" name="WEBCRAWLERS" />
<meta content="en-us" name="language" />
<meta content="en-us" http-equiv="content-language" />
<script type="application/ld+json">
	  {
     "@context": "http://schema.org",
     "@type": "NewsArticle",
     "mainEntityOfPage":{
       "@type":"WebPage",
       "@id":"%s"
     },
     "headline": "%s",
	 "description": "%s",
	  "datePublished": "2022-11-24 04:50:58+01:00",
     "dateModified": "%s",
	 "image": {
       "@type": "ImageObject",
       "url": "%s/static/637e940cb6285_1669239820.png",
       "height": 860,
       "width": 480
     },
	  "author": {
       "@type": "Person",
       "name": "Wildfoster"
     },
     "publisher": {
       "@type": "Organization",
       "name": "%s",
       "logo": {
         "@type": "ImageObject",
         "url": "%s/static/637e940cb6285_1669239820.png",
         "width": 109,
         "height": 60
       }
     }
    }
</script>

', $sitename, $desc, $metatags, $siteurl, $sitename, $desc, $date, $siteurl, $sitename, $siteurl);
	
}elseif($url == "cat"){
	$sql = "SELECT * FROM `settings`";
$query = mysqli_query($connect, $sql);
$mrow = mysqli_fetch_assoc($query);
$sitename = $mrow['homepage'];
 $sep = $mrow['sep'];
 
 $query = $reconn->query("SELECT * FROM `category` WHERE `slug` = '$id'");
 $fetch = $query->fetch_assoc();
 $desc = $fetch["description"];
 $name = $fetch["name"];
 
 printf("<title>%s %s %s</title>
 
 <meta name='title' content='%s'>
 <meta name='description' content='%s'>
 <meta name='robots' content='index,follow'>
<meta content='global' name='distribution' />
<meta content='1 days' name='revisit' />
<meta content='1 days' name='revisit-after' />
<meta name='serp-rank' position='1' />
<meta content='document' name='resource-type' />
<meta content='all' name='audience' />
<meta content='global' name='target' />
<meta content='all' name='robots' />
<meta content='index, follow' name='robots' />
<meta content='all' name='googlebot' />
<meta content='index, follow' name='GOOGLEBOT' />
<meta content='index, follow' name='yahooBOT' />
<meta content='all' name='msnbot' />
<meta content='all' name='Googlebot-Image' /> 
<meta content='all' name='WEBCRAWLERS' />
<meta content='en-us' name='language' />
<meta content='en-us' http-equiv='content-language' />



 ", ucwords($name), $sep, $sitename, $id, $desc);
 
}elseif($url == "tags"){
	$sql = "SELECT * FROM `settings`";
$query = mysqli_query($connect, $sql);
$mrow = mysqli_fetch_assoc($query);
$sitename = $mrow['homepage'];
 $sep = $mrow['sep'];
 
 printf("<title>TAG: %s %s %s</title>
 
 <meta name='title' content='%s'>
 <meta name='description' content='%s'>
  <meta name='robots' content='index,follow'>
<meta content='global' name='distribution' />
<meta content='1 days' name='revisit' />
<meta content='1 days' name='revisit-after' />
<meta name='serp-rank' position='1' />
<meta content='document' name='resource-type' />
<meta content='all' name='audience' />
<meta content='global' name='target' />
<meta content='all' name='robots' />
<meta content='index, follow' name='robots' />
<meta content='all' name='googlebot' />
<meta content='index, follow' name='GOOGLEBOT' />
<meta content='index, follow' name='yahooBOT' />
<meta content='all' name='msnbot' />
<meta content='all' name='Googlebot-Image' /> 
<meta content='all' name='WEBCRAWLERS' />
<meta content='en-us' name='language' />
<meta content='en-us' http-equiv='content-language' />

 
 ", $id, $sep, $sitename, $id, $id);
}elseif($url == "search"){
	
	$sql = "SELECT 	* FROM `settings`";
	
	$query = mysqli_query($connect, $sql);
	
	$row = mysqli_fetch_assoc($query);
	
	$sep = $row['sep'];
	$sitename = $row['homepage'];
	
	
printf("<title>Search Query For: %s %s %s</title>
 
 <meta name='title' content='%s'>
 <meta name='description' content='%s'>
 ", $info, $sep, $sitename, $info, $info);
	
}elseif($url == "dashboard"){
	
	$sql = "SELECT 	* FROM `settings`";
	
	$query = mysqli_query($connect, $sql);
	
	$row = mysqli_fetch_assoc($query);
	
	$sep = $row['sep'];
	$sitename = $row['homepage'];

printf("<title>User Dashboard %s %s </title>", $sep, $sitename);	
	
}elseif($url == "404"){
	echo"<title>404: Error Page</title>";
}


echo"</head>
<body>";
?>









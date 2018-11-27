<!DOCTYPE html>
<html>
<head>
    <title>My Rss Reader</title>
</head>
<body>
    <form>
        Enter feed URL here: <input type="text" name="feed_url" value="https://www.whatismybrowser.com/">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
        if(isset($_REQUEST['feed_url'])){
            echo "feed_urlstat";
            require './vendor/autoload.php';
            $myClient  = new Goutte\Client([
                'headers' => ['User-Agent'=>'MyReader']
            ]);
            $crawler = $myClient->request('GET',$_REQUEST['feed_url']);
            var_dump($crawler);
            foreach ($crawler as $domElement) {
                var_dump($domElement->nodeName);
            }
        }
    ?>
</body>
</html>
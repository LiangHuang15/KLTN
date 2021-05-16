
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>loaddatapage</title>
    </head>
    <body>
        <?php
            $string = file_get_contents("/Applications/XAMPP/xamppfiles/htdocs/recommender_system/output.json");
            $result = json_decode($string, true);
            for($i = 0 ; $i < count($result['movie_title'])  ; $i++)
            {
                {
                    // convert  array to string 
                    print_r($result['movie_title'][$i]);
                    echo "\t";
                    echo 'genres: ' ;
                    print_r($result['genres'][$i]);
                    ?>
                    <br>
                    <?php
                }
            }
        ?>
        <?php
            // include('/Applications/XAMPP/xamppfiles/htdocs/recommender_system/php-simple/src/simplehtmldom_1_5/simple_html_dom.php');
            // $search_keyword = str_replace('','+',$result['movie_title'][1]);
            // $newhtml = file_get_html("https://www.google.com/search?q=".$search_keyword." &tbm=isch");
            // $result_image_source= $newhtml -> find('img',0) -> src;
            // echo '<img src="'.$result_image_source.'">';





            // test get url image in google
            function search_keyword($url = false)
            {
                if(!$url && !$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']: false){
                    return '';               
                }
                $parts_url = parse_url($url);
                $query = isset($parts_url['query']) ? $parts_url['query']: (isset($parts_url['frament']) ? $parts_url['frament'] : '');
                if(!$query)
                {return '';}
                parse_str($query,$parts_query);
                return isset($parts_query['q']) ? $parts_query['q'] : (isset($parts_query['p']) ? $parts_query['p']: '');
            }
        ?>
    </body>
</html>

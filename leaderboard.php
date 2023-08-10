<?php
include "includes/header.php";
$status = 0;
if(isset($_SESSION['username']) && $_SESSION['username']!=""){
    $status = 1;   
}
function data_to_html($arr){
    foreach($arr as $data){
                
        ?>
         <tr>
             <td><?=$data["username"]?></td>
             <td><?=$data["level"]?></td>
             <td><?=$data["score"]?></td>
         </tr>

     <?php
     }
}
function greater($arr){
    $max=0;
    foreach($arr as $ar){
        if($ar['score']>$max){
            $max = $ar['score'];
           
        }
    }

    return $max;

}
?>
<main id="main">
    <?php 
        if($status == 1){
    ?>
    <div id="leaderboard">
        <table id="scores">
            <thead>
                <th>Username</th>
                <th>Level</th>
                <th>Score</th>
            </thead>
            <tbody>
                <?php
                $users=array();
                $scores_simple = array();
                $scores_medium = array();
                $scores_complex = array();
                foreach ($_COOKIE['user'] as $name => $value) {
                    $values = explode("|",$value);
                    $name = htmlspecialchars($name);
                    $level = $values[1];
                    $sc = $values[2];
                    $score= [
                        "username" => $name,
                        "level" => $level,
                        "score" => $sc 
                    ];
                    array_push($users,$score);

                    // if($level == "simple"){
                    //     array_push($scores_simple,$score);
                    // }
                    // if($level == "medium"){
                    //     array_push($scores_medium,$score);

                    // }
                    // if($level == "complex"){
                    //     array_push($scores_complex,$score);
                    // }
                }
                array_multisort(array_column($users,"score"),SORT_DESC,$users);
                data_to_html($users);

                // array_multisort(array_column($scores_simple,"score"),SORT_DESC,$scores_simple);
                // array_multisort(array_column($scores_medium,"score"),SORT_DESC,$scores_medium);
                // array_multisort(array_column($scores_complex,"score"),SORT_DESC,$scores_complex);
                // $ms = greater($scores_simple);
                // $md = greater($scores_medium);
                // $mc = greater($scores_complex);

                // if($ms >= $md && $ms >= $mc){
                //     data_to_html($scores_simple);
                //     if($md> $mc){
                //     data_to_html($scores_medium);
                //     data_to_html($scores_complex);
                //     }else{
                //         data_to_html($scores_complex);
                //         data_to_html($scores_medium);
                //     }
                // }else if($md >= $ms && $md >= $mc){
                //     data_to_html($scores_medium);
                //     if($ms> $mc){
                //         data_to_html($scores_simple);
                //         data_to_html($scores_complex);
                //     }else{
                //         data_to_html($scores_complex);
                //         data_to_html($scores_simple);

                //     }
                // }else{
                //     data_to_html($scores_complex);
                //     if($ms > $md){
                //         data_to_html($scores_simple);
                //         data_to_html($scores_medium);
                //     }else{
                //         data_to_html($scores_medium);
                //         data_to_html($scores_simple);
                //     }
                // }
                ?>
            </tbody>
        </table>
    </div>
    <?php 
    }else{
        echo "<h1>You have to register!</h1>";
    } ?>
</main>
<?php

include "includes/footer.php";
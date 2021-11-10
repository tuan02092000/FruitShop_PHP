<?php
    function pagination($number, $page, $addition){
        if($number > 1){
            echo '<div>';
                echo '<ul class="pagination">';
                    if($page > 1){
                        echo '<li class="page-item"><a href="?page='.($page - 1).'&search='.$addition.'">Prev</a></li>';
                    }
                    $avaiablePage = [1, $page - 1, $page, $page + 1, $number+1];
                    $isFirst = $isLast = false;
                        for($i = 1; $i <= $number; $i++){
                            if(!in_array($i + 1, $avaiablePage)){
                                if(!$isFirst && $page > 3){
                                    echo '<li class="page-item"><a href="?page='.($page - 2).'&search='.$addition.'">...</a></li>';
                                    $isFirst = true;
                                }
                                if(!$isLast && ($i > $page)){
                                    echo '<li class="page-item"><a href="?page='.($page + 2).'&search='.$addition.'">...</a></li>';
                                    $isLast = true;
                                }
                                continue;
                            }
                            if($page == $i){
                                echo '<li class="page-item active"><a href="">'.$i.'</a></li>';
                            }else{
                                echo '<li class="page-item"><a href="?page='.$i.'&search='.$addition.'">'.$i.'</a></li>';
                            }
                        }
                    if($page < $number){
                        echo '<li class="page-item"><a href="?page='.($page + 1).'&search='.$addition.'">Next</a></li>';
                    }
                echo '</ul>';
            echo '</div>'; 
        }
    }  
?>

<?php
include_once "includes/config.php";

$sql = "SELECT * FROM data";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($res, MYSQLI_NUM);
$num_rows = mysqli_num_rows($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/vocab.css">
    <link rel="manifest" href="manifest.json" >
    
    <title>Vocab</title>
</head>
<body>
    
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <a href="#name"><span class="white-text name">John Doe</span></a>
                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div>
        </li>
        <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
        <li><a href="#!">Second Link</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="subheader">Subheader</a></li>
        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    </ul>

    <!-- <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->

    <div class="row">
        <div class="col s12">
        <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#test1"><span class="tab-val">En</span></a></li>
            <li class="tab col s3"><a href="#test2"><span class="tab-val">Jap</span></a></li>
            <li class="tab col s3"><a href="#test3"><span class="tab-val">Js</span></a></li>
            <li class="tab col s3"><a href="#test4"><span class="tab-val">Php</span></a></li>
        </ul>
        </div>
        <!-- <div id="test1" class="col s12">Test 1</div>
        <div id="test2" class="col s12">Test 2</div>
        <div id="test3" class="col s12">Test 3</div>
        <div id="test4" class="col s12">Test 4</div> -->
    </div>

    <nav class="white">
        <div class="nav-wrapper">
            <form>
                <div class="input-field">
                    <input id="search" type="search" onkeyup="searchBar(event)">
                    <label class="label-icon" for="search"><i class="material-icons grey-text">search</i></label>
                    <i class="material-icons" id="clearSearches">close</i>
                </div>
            </form>
        </div>
    </nav>

    <div class="items-list">

    </div>

    <div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
    </a>

    <ul>
        <li><a class="btn-floating amber lighten-2 sorts" data-sort="word-sort">w</a></li>
        <li><a class="btn-floating purple lighten-2 sorts" data-sort="phrase-sort">p</a></li>
        <li><a class="btn-floating cyan lighten-2 sorts" data-sort="quote-sort">q

        </a></li>
        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
    </div>

    <div class="overlay-writer">
        <label class="keyboard_arrow_down"><i class=" material-icons grey-text right">keyboard_arrow_down</i></label>
        <form action = "action scripts/edit.php" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input value="." id="Word" type="text" class="validate" name="word">
                <label class="active" for="Word">Word</label>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="Elaboration" class="materialize-textarea" name="elaboration" onkeyup="keyups(event)">.</textarea>
                    <label for="Elaboration">Elaboration</label>
                </div>
            </div>

            <div class="switch">
                <label>
                Word
                <input type="checkbox" name="category" value="q">
                <span class="lever"></span>
                Quote
                </label>
            </div>

            <p>
                <label>
                    <input type="checkbox" name="category" value="p"/>
                    <span>Phrase</span>
                </label>
            </p>

            <label class="delete"><i class=" material-icons grey-text right">delete</i></label>
            <input id="Id" type="text" value="" name="id" class="hide">
            <input type="submit" value="✓" class="done right">
        </form>
    </div>

    

    <script src="js/vocab.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>

        $(document).ready(function(){
        $('.sidenav').sidenav();
        $('.tabs').tabs();
        $('.fixed-action-btn').floatingActionButton();
        });

        var ids = [];
        var words = [];
        var elaboration = [];
        var category = [];
        <?php
        for($i = 0; $i < $num_rows; $i++)
        {
            echo "ids.push('".$row[$i][0]."');";
            echo "words.push('".$row[$i][1]."');";
            echo "elaboration.push('".$row[$i][2]."');";
            echo "category.push('".$row[$i][3]."');";
        }
        
        ?>

        renderer();
        //renders in DOM
        function renderer() {
            for(var i = 0; i<words.length; i++)
            {
                var lftBdr = colorCode(category[i]);
                var wrd = (words[i] == '.')? "" : words[i];
                var color = (words[i] == '.' || words[i] == "")? "black" : "grey";
                document.querySelector('.items-list').innerHTML += 
                `<div class="item" style="border-left-color: ${lftBdr};">
                    <h6 class="word" data-id="${ids[i]}">${wrd}</h6>
                    <span class="elaboration ${color}-text">
                        ${elaboration[i]}
                    </span>
                </div>`;
            }
        }

        //Not to block the initial load of the page with news content wanna load basic html as soon as possible
        window.addEventListener('load', e => { 
            if ('serviceWorker' in navigator) {
                try {
                    navigator.serviceWorker.register('sw.js');
                    console.log('sw reg');
                }
                catch (error) {
                    console.log('sw not reg');
                }
            }
        });
        
         _('.keyboard_arrow_down').addEventListener("click", function () {
            _('.overlay-writer').style.transform = "translateX(-100vw)";
            _('.overlay-writer').style.height = "0";
            _('.overlay-writer').style.boxShadow = "0px 0px 0px 0px grey";
        });

        _('.btn-floating').addEventListener("dblclick", function () {
            _('.overlay-writer').style.transform = `translate(100vw, ${window.pageYOffset-10}px)`;
            _('.overlay-writer').style.height = "80vh";
            _('.overlay-writer').style.boxShadow = "1px 2px 30px 4px grey";
        });

        //Deletes an item
        _('.delete').addEventListener("click", function () {
            window.location.href = `action scripts/delete.php?id=${_('#Id').value}`;
        });

        _('#clearSearches').addEventListener("click", function () {
            document.querySelector('.items-list').innerHTML = "";
            renderer();
        });

        //Tabs
        _all('.tab', 'click', function () {
            // alert(this.querySelector('.tab-val').innerHTML);
            var slideDis = 400;
            for(var x = 0; ; x++)
            {   
                try {
                    document.getElementsByClassName('item')[x].style.transform = `translateX(-${slideDis}px)`;
                    document.getElementsByClassName('item')[x].style.opacity = "0";
                    slideDis += 400;
                }
                catch {break;}
            }
            //clears out item list when transition is done
            setTimeout(function () {
                document.querySelector('.items-list').innerHTML = "";
            }, 400);
        });

        function sleep(delay) {
            var start = new Date().getTime();
            while (new Date().getTime() < start + delay);
        }

        for(var ii = 0; ii < 3; ii++)// ***Change upperLimit if nos of sort floating btn changes
        _all('.sorts')[ii].addEventListener("click", function () {
            var sortCode;   //sortCodes are sorting abbreviation
            if(this.getAttribute('data-sort') == "word-sort")
            sortCode = 'w';
            else if(this.getAttribute('data-sort') == "phrase-sort")
            sortCode = 'p';
            else if(this.getAttribute('data-sort') == "quote-sort")
            sortCode = 'q';

            for(var i = 0; i < category.length; i++)
            {
                var lftBdr = colorCode(category[i]);

                if(category[i] == sortCode)
                {
                    document.querySelector('.items-list').innerHTML = 
                    `<div class="item" style="border-left-color: ${lftBdr};">
                        <h6 class="word" data-id="${ids[i]}">${words[i]}</h6>
                        <span class="elaboration grey-text">
                            ${elaboration[i]}
                        </span>
                    </div>` + document.querySelector('.items-list').innerHTML;
                }
            }
        })

        for (var i = 0; i < countElement("item"); i++)
            _all('.item')[i].addEventListener("click", function (event) {
                _('.overlay-writer').style.transform = `translate(100vw, ${window.pageYOffset-10}px)`;
                _('.overlay-writer').style.height = "80vh";
                _('.overlay-writer').style.boxShadow = "1px 2px 30px 4px grey";

                _('#Id').value = this.getElementsByClassName('word')[0].getAttribute("data-id");
                _('#Word').value = this.getElementsByClassName('word')[0].innerHTML.trim();
                _('#Elaboration').value = this.getElementsByClassName('elaboration')[0].innerHTML.trim();
            });

        //finds the frequency of a class
        function countElement(search) {
            var itemsList = _('.items-list').innerHTML;
            var freq = 0;
            for (var i = 0; i < itemsList.length; i++)
            {
                if (itemsList.charAt(i) == search.charAt(0))
                {
                    var c = 0;
                    for (var j = 0; j < search.length; j++)
                    {
                        if (itemsList.charAt(i+j) == search.charAt(j))
                        c++;
                    }
                    if (c == search.length) freq++;
                }
            }
            return freq;
        }

        function countElement(search) {
            var itemsList = _('.items-list').innerHTML;
            var freq = 0;
            for (var i = 0; i < itemsList.length; i++) {
                if (itemsList.charAt(i) == search.charAt(0)) {
                    var c = 0;
                    for (var j = 0; j < search.length; j++) {
                        if (itemsList.charAt(i + j) == search.charAt(j))
                            c++;
                    }
                    if (c == search.length) freq++;
                }
            }
            return freq;
        }

        //removing keycode 13 problem
        function keyups() {
            if (event.keyCode == 13) {
                _('#Elaboration').value = _('#Elaboration').value.substring(0, _('#Elaboration').value.length - 1) + "<br>";
            }
        }

        //search
        function searchBar() {
            // alert(document.querySelector('.items-list').innerHTML);
            if(event.keyCode == 8)return;
            for(var i = 0; i<words.length; i++)
            {
                if( (words[i].search(_('#search').value) >-1 || elaboration[i].search(new RegExp(_('#search').value, "i")) >-1) && (document.querySelector('.items-list .word').innerHTML != words[i]
                    && document.querySelector('.items-list .elaboration').innerHTML != elaboration[i] )
                )
                {
                    var lftBdr = colorCode(category[i]);

                    document.querySelector('.items-list').innerHTML = 
                    `<div class="item" style="border-left-color: ${lftBdr}">
                        <h6 class="word" data-id="${ids[i]}">${words[i]}</h6>
                        <span class="elaboration grey-text">
                            ${elaboration[i]}
                        </span>
                    </div>` + document.querySelector('.items-list').innerHTML;
                }
            }
        }

        function colorCode(category) {
            if(category == 'p')
                var lftBdr = "#ba68c8";
                else
                var lftBdr = (category == 'w')? "#ffd54f" : "#4dd0e1";
                return lftBdr;
        }

        function _(ele) {
            return document.querySelector(ele);
        }

        function _all(ele, evntL, method) {
            for(var x = 0; ; x++)
            {
                try{
                    document.querySelectorAll(ele)[x].addEventListener(evntL, method);
                }
                catch {break;}
            }
        }
    </script>

</body>
</html>
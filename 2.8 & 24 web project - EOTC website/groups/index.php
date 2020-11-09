<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tawa College EOTC 2020</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div id="header">
    <img src="../assets/images/Tawa-Logo.png" id="logo">
    <ul id="nav">
        <a href="../"><li>Home</li></a>
        <li>
            <ul>
                <a href="../information"><li>Information</li></a><hr>
                <a href=""><li>Days Bay</li></a>
                <a href=""><li>Paintball</li></a>
                <a href=""><li>H<sup>2</sup>O Xtream</li></a>
                <a href=""><li>Mt. KauKau</li></a>
                <a href=""><li>Community<br>Service</li></a>
            </ul>
            Information
        </li>
        <a href="../groups"><li style="background-color: #48D9D4">Groups</li></a>
    </ul>
</div>
<div class="med_bg_image" style="background-image: url('../assets/images/Community Services/100_0958.JPG');">
    <h1>Group Timetables</h1>
</div>
<?php
// Only make the data accessable inside Tawa College
if ($_SERVER["REMOTE_ADDR"] == "122.56.185.33") {
    ?><div id="content">
        <button class="button" style="display: inline-block; border-radius: 5px; padding: 10px;" onclick="show_search()">Search for a user!</button>
        <button class="button" style="display: none; border-radius: 5px; padding: 10px; background-color: red;margin-left: 10px;" onclick="clear_search()" id="search_clear">Clear search</button>
        <div class="group_box" id="group_box">
            Things not loading? Try clicking <a href="javascript:clear_search()">here</a>!
            <!--        <div>-->
            <!--            <h1>Group 1</h1>-->
            <!--            <div id="group_1">-->
            <!--                <div>-->
            <!--                    Getting group 1 members...-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <a class="button">View Group 1 Timetable</a>-->
            <!--            <a class="button">Download Group 1 Timetable</a>-->
            <!--        </div>-->
        </div>
    </div>
    <div id="search_box" style="display: none; position: fixed; top: 0; left: 0; right: 0; height: 100vh; background-color: rgba(0,0,0,0.75);">
        <div class="centerpoint">
            <form onsubmit="return group_update()" style="text-align: center; border-radius: 20px; padding: 20px; box-shadow: 0 5px 10px rgba(0,0,0,0.5); background-color: white; margin-top: -69px; margin-left: calc(-40vw - 20px); width: 80vw;">
                Search for a username:<br>
                <input value="" type="text" id="search" placeholder="Search" style="margin: 20px; padding: 10px; border-radius: 5px; width: 50%; max-width: 700px; background-color: white;"><button class="button" style="display: inline-block; border-radius: 5px; padding: 10px;">Search!</button>
            </form>
        </div>
    </div>
    <!-- Get group lists -->
    <script>
        let data = []
        for (let i = 0; i < 70; i++) {
            data.push(i.toString())
        }
        let groups = [
            {
                id: 1,
                data: data,
            },{
                id: 2,
                data: ["7jhawinkels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "ThePerson", "techangels", "techangels"],
            },{
                id: 3,
                data: ["7jhawinkels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "ThePerson", "techangels", "techangels"],
            },{
                id: 4,
                data: ["GoogleIT2", "7jhawinkels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "techangels", "ThePerson", "techangels", "techangels"],
            }
        ]

        function group_update() {
            let search = document.getElementById("search")
            for (let group of groups) {
                let div = document.getElementById("group_" + group.id)
                let output = ""
                for (let person of group.data) {
                    if (person.toLowerCase().startsWith(search.value.toLowerCase())) {
                        output += "<div>" + person + "</div>"
                    }
                }
                if (output === "") {
                    // Output for this group is blank
                    div.parentElement.style.display = "none"
                } else {
                    div.innerHTML = output
                    div.parentElement.style.display = "block"
                }

                if (search.value.toLowerCase() === "this is retarded") {
                    alert("Let me correct you there...")
                    window.location.href = "https://www.dictionary.com/browse/retarded"
                }
            }
            hide_search()
            if (search.value === "") {
                document.getElementById("search_clear").style.display = "none"
            } else {
                document.getElementById("search_clear").style.display = "inline-block"
            }
            return false
        }

        function show_search() {
            document.getElementById("search_box").style.display = "block"
        }

        function hide_search() {
            document.getElementById("search_box").style.display = "none"
        }

        function clear_search() {
            document.getElementById("search").value = ""
            group_update()
        }

        document.onreadystatechange = function () {
            let output = ""
            let search = document.getElementById("search")
            for (let group of groups) {
                output += "<div><h1>Group " + group.id + "</h1><div id='group_" + group.id + "'>"
                for (let person of group.data) {
                    if (person.toLowerCase().startsWith(search.value.toLowerCase())) {
                        output += "<div>" + person + "</div>"
                    }
                }
                output += "</div><a class='button' style='width: calc(100% - 40px)'>View Timetable</a><a class='button' style='width: calc(100% - 40px); margin-top: 0;'>Download Timetable</a></div>"
            }
            document.getElementById("group_box").innerHTML = output
        }
    </script><?php
} else {
?><div id="content">For privacy reasons, we cannot serve you the content of this page while you are not on the Tawa College premises.</div><?php
}
?>
<div class="sm_img_seperator"></div>
<div class="copyright">Copyright</div>
</body>
</html>
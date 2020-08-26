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
        <li>Home</li>
        <li>
            <ul>
                <li>Information</li><hr>
                <li>Days Bay</li>
                <li>Paintball</li>
                <li>H<sup>2</sup>O Xtream</li>
                <li>Mt. KauKau</li>
                <li>Community<br>Service</li>
            </ul>
            Information
        </li>
        <li>Groups</li>
    </ul>
</div>
<div class="med_bg_image" style="background-image: url('../assets/images/Community Services/100_0958.JPG');">
    <h1>Group Timetables</h1>
</div>
<div id="content">
    <button class="button" style="display: inline-block; border-radius: 5px; padding: 10px;" onclick="show_search()">Search for a user!</button>
    <button class="button" style="display: none; border-radius: 5px; padding: 10px; background-color: red;margin-left: 10px;" onclick="clear_search()" id="search_clear">Clear search</button>
    <div class="group_box" id="group_box">
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
<script src="group_data.js"></script>
<script>
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
            output += "</div><a class='button'>View Timetable</a><a class='button'>Download Timetable</a></div>"
        }
        document.getElementById("group_box").innerHTML = output
    }
</script>
<div class="sm_img_seperator"></div>
<div class="copyright">Copyright</div>
</body>
</html>
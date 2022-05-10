function my_textarea(id_user) {
    var textarea = document.querySelector("textarea");
    textarea.addEventListener("input", function (e) {
        if (textarea.value) {
            if (e.data == "@") {
                ajax_follower(id_user, "textarea");
            }
            else if ((e.data == " ") || (e.inputType == "deleteContentBackward")) {
                try {
                    document.querySelector(".tweet-form").removeChild(document.querySelector("#my_toggle"));
                } catch (error) {

                }
            }
        }
    });
}

function ajax_follower(id, where) {
    if (document.querySelector("#my_toggle")) {
        if (where != "textarea") {
            document.querySelector("#follow").removeChild(document.querySelector("#my_toggle"));
            return;
        } else {
            document.querySelector(".tweet-form").removeChild(document.querySelector("#my_toggle"));
            return;
        }
    }

    var div = document.createElement("div");
    var mini_div = document.createElement("div");
    var col = document.createElement("div");

    if (where === "textarea") {
        var which_div = document.querySelector(".tweet-form");
        var coord = which_div.getBoundingClientRect();
    } else {
        var which_div = document.querySelector("#follow");
        var coord = which_div.getBoundingClientRect();
    }

    div.id = "my_toggle";
    mini_div.className = "row";
    col.className = "col-12";
    which_div.appendChild(div);

    var my_toggle = document.querySelector("#my_toggle");

    my_toggle.style.top = (coord.top + 50) + "px";
    my_toggle.style.left = coord.left + "px";
    div.appendChild(mini_div);
    mini_div.appendChild(col);

    fetch("http://localhost:8000/modele/list_user.php?followers=" + id)
        .then(data => data.text()
            .then(message => {
                col.innerHTML = message;
            })
        );
}

function ajax_following(id, where) {
    if (document.querySelector("#my_toggle")) {
        if (where != "textarea") {
            document.querySelector("#follow").removeChild(document.querySelector("#my_toggle"));
            return;
        } else {
            document.querySelector(".tweet-form").removeChild(document.querySelector("#my_toggle"));
            return;
        }
    }

    var div = document.createElement("div");
    var mini_div = document.createElement("div");
    var col = document.createElement("div");

    if (where === "textarea") {
        var which_div = document.querySelector(".tweet-form");
        var coord = which_div.getBoundingClientRect();
    } else {
        var which_div = document.querySelector("#follow");
        var coord = which_div.getBoundingClientRect();
    }

    div.id = "my_toggle";
    mini_div.className = "row";
    col.className = "col-12";
    which_div.appendChild(div);

    var my_toggle = document.querySelector("#my_toggle");

    my_toggle.style.top = (coord.top + 50) + "px";
    my_toggle.style.left = coord.left + "px";
    div.appendChild(mini_div);
    mini_div.appendChild(col);

    fetch("http://localhost:8000/modele/list_user.php?following=" + id)
        .then(data => data.text()
            .then(message => {
                col.innerHTML = message;
            })
        );
}

function insert_user(pseudo) {
    try {

        document.querySelector("textarea").value = document.querySelector("textarea").value
            .substring(0, (
                document.querySelector("textarea")
                    .value.lastIndexOf("@") + 1)
            );
        document.querySelector("textarea").value += pseudo;
        document.querySelector(".tweet-form").removeChild(document.querySelector("#my_toggle"));
    } catch (error) {

    }
}

function timeline() {
    var my_timeline = document.querySelector("#timeline");

    fetch("http://localhost:8000/vue/timeline.php")
        .then(data => data.text())
        .then(function (requete) {
            try {
                my_timeline.innerHTML = requete;
            } catch (error) {

            }
        });
}

document.addEventListener('DOMContentLoaded', function () {
    try {
        timeline();
        setInterval(function () { timeline(); }, 10000);
    } catch (error) {

    }
});

function follow_user(id, follow) {
    fetch("http://localhost:8000/modele/follow_user.php?who_am_i_follow=" + id + "&id=" + follow)
        .catch(function (errors) {
            console.log(errors);
        });

    window.location.reload();

}

function unfollow(id_follow) {
    window.location.href = "http://localhost:8000/modele/unfollow_user.php?user=" + id_follow;
}

function message(id_user, id_guest) {
    var div = document.getElementById("my_message");

    try {
        fetch("http://localhost:8000/vue/message.php?user=" + id_user + "&guest=" + id_guest)
            .then(data => data.text())
            .then(function (message) {
                if (div.innerHTML != message) {
                    div.innerHTML = message;
                }
            })
            .then(function () {
                document.getElementById("content_message").scroll(0, document.getElementById("content_message").scrollHeight);
            });
    } catch (error) {

    }
}

function get_message(id_user, id_guest) {
    message(id_user, id_guest);
    setInterval(function () { message(id_user, id_guest); }, 10000);
}

function see_gif(query)
{
    fetch(encodeURI("https://api.giphy.com/v1/gifs/search?api_key=P9SgH48ELr8vIj4EIvmpvU9PVeigAjHQ&q="+query))
    .then(data => data.text())
    .then(my_json => JSON.parse(my_json))
    .then(function (message) {
        var tweet_form = document.getElementsByClassName("tweet-form")[0];
        if (document.querySelector(".my_gif") !== null){
            tweet_form.removeChild(document.querySelector(".my_gif"));
        }
        var my_box = document.createElement("div");
        var my_search = document.createElement("input");
        my_search.type = "text";
        my_search.style.marginBottom = "5%";
        if (query === undefined)
            my_search.value = "";
        else
            my_search.value = query;
        my_search.addEventListener("input", function () {
                see_gif(my_search.value);
        });
        my_box.className = "my_gif";
        my_box.appendChild(my_search);
        for (let i = 0; i < 20; i++) {
            var my_link = message.data[i].images.fixed_width.url;
            var img = document.createElement("img");
            img.src = my_link;
            img.width = 150;
            img.className = "btn";
            img.setAttribute("onclick", "send_gif('" + my_link + "')");
            my_box.appendChild(img);
        }
        tweet_form.appendChild(my_box);
        
    });
}

function send_gif(link)
{
    document.getElementsByName("tweet")[0].style.backgroundImage = "url(" + link + ")";
    document.getElementsByName("tweet")[0].style.backgroundRepeat = "no-repeat";
    document.getElementsByName("tweet")[0].style.backgroundSize = "cover";
    document.getElementsByName("tweet")[0].style.backgroundPosition = "center";
}

function emoji()
{
    if (document.querySelector(".my_emoji") === null) {
    fetch("https://emoji-api.com/emojis?access_key=d4039b62639c5f90e41970e069c01f48d2ec4e9d")
    .then(data => data.text())
    .then(json => JSON.parse(json))
    .then(function (message) {
        var tweet_form = document.getElementsByClassName("tweet-form")[0];
        var my_box = document.createElement("div");
        my_box.className = "my_emoji";
        for (let i = 0; i < 99; i++) {
            var my_link = message[i].character;
            var img = document.createElement("p");
            img.innerHTML = my_link;
            img.className = "btn";
            img.setAttribute("onclick", "emoji_text('" + my_link + "')");
            my_box.appendChild(img);
        }
        tweet_form.appendChild(my_box);
        
    });
} else {
    document.querySelector(".my_emoji").remove();
}
}

function emoji_text(emoji)
{
    var my_textarea = document.getElementById("tweet");

    my_textarea.value += emoji;
}
//buttons
const public = document.getElementById('post-action2');
const private = document.getElementById('post-action1');

//divs
const public_posts = document.getElementsByClassName('public');
const my_posts = document.getElementsByClassName('private');

// calling functions
public.addEventListener("click", displayPublic);
private.addEventListener("click", displayPrivate);

// get all the public posts
function displayPublic() {
    // toggle buttons
    public.style.background = "#081A59";
    public.style.color = "#ffffff";

    private.style.background = "#ffffff";
    private.style.color = "#081A59";
    
    // toggle pages
    public_posts.style.display = "block";
    my_posts.style.display = "none";

}

// get all the private posts
function displayPrivate() {
    // toggle buttons
    public.style.background = "#ffffff";
    public.style.color = "#081A59";

    private.style.background = "#081A59";
    private.style.color = "#ffffff";

    // toggle pages
    public_posts.style.display = "none";
    my_posts.style.display = "block";

}
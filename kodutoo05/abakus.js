window.onload = function() {
    var beads = document.querySelectorAll(".bead");
    for (var i = 0; i<beads.length; i++){
        var b = beads[i];
        b.onclick = function(){
            var position = window.getComputedStyle(this).cssFloat;
            if (position=="right"){
                this.style.cssFloat="left";
            } else if (position=="left"){
                this.style.cssFloat="right";
            }
        }
    }
}
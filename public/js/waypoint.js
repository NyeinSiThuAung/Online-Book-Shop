// Nav Waypoint

const navWaypoint = new Waypoint({
    element: document.getElementById('navScrollWp'),
    handler: (direction) => {
        if(direction === "down"){
            document.getElementsByClassName('nav-waypoint')[0].classList.add("fixed-top");
            document.getElementsByClassName('nav-waypoint')[0].classList.add("bg-color");
        }else{
            document.getElementsByClassName('nav-waypoint')[0].classList.remove("fixed-top");
            document.getElementsByClassName('nav-waypoint')[0].classList.remove("bg-color");
        }
    },
    offset: '32%'
    })
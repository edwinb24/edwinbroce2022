// setSceneHeight emulate the Z- axis depth, since we are scrolling vertically
// the height combine how fast our scrolling is our camera perspective, etc. and
// make everything come together.

const INITIAL_CAMERA_POSITION = parseFloat(
    getComputedStyle(document.documentElement).getPropertyValue("--cameraZ")
);

//Get initial coordinates and stablish how much the camera will move
const PERSPECTIVE_ORIGIN = {
    x: parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue(
            "--scenePerspectiveOriginX"
        )
    ),
    y: parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue(
            "--scenePerspectiveOriginY"
        )
    ),
    max_gap_desktop: 10,
    max_gap_mobile: 20,
};

document.addEventListener("DOMContentLoaded", () => {
    window.addEventListener("deviceorientation", GyroCameraMovement);
    window.addEventListener("scroll", moveCamera);
    window.addEventListener("mousemove", MouseCameraMovement);
    setSceneHeight();
});

function MouseCameraMovement(e) {
    let x_gap =
        (((e.clientX - window.innerWidth / 2) * 100) /
            (window.innerWidth / 2)) *
        -1;
    let y_gap =
        (((e.clientY - window.innerHeight / 2) * 100) /
            (window.innerHeight / 2)) *
        -1;
    moveCameraAngle(x_gap, y_gap, PERSPECTIVE_ORIGIN.max_gap_desktop);
}
function GyroCameraMovement(e) {
    moveCameraAngle(e.gamma, e.beta, PERSPECTIVE_ORIGIN.max_gap_mobile);
}

function moveCameraAngle(x_gap, y_gap, max_gap) {
    let new_perspective_x = PERSPECTIVE_ORIGIN.x + (x_gap * max_gap) / 100;
    let new_perspective_y = PERSPECTIVE_ORIGIN.y + (y_gap * max_gap) / 100;

    document.documentElement.style.setProperty(
        "--scenePerspectiveOriginX",
        new_perspective_x
    );
    document.documentElement.style.setProperty(
        "--scenePerspectiveOriginY",
        new_perspective_y
    );
}

function setSceneHeight() {
    let list_of_items = document.getElementsByClassName("floating_element");
    let number_of_items = list_of_items.length;
    let item_z_index = parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue("--itemZ")
    );
    let perspective = parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue(
            "--scenePerspective"
        )
    );
    let camera_speed = parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue(
            "--cameraSpeed"
        )
    );
    let height =
        window.innerHeight +
        perspective * camera_speed +
        item_z_index * camera_speed * (number_of_items - 1) +
        300;
    document.documentElement.style.setProperty("--viewportHeight", height);
}

// moveCamera simulate the movement of the camera by converting the user
//scrolling onto movement on a 3D space
function moveCamera() {
    document.documentElement.style.setProperty(
        "--cameraZ",
        window.pageYOffset + INITIAL_CAMERA_POSITION
    );
    console.log("window.pageYOffset");
    console.log(window.pageYOffset);

    const elementNumber = parseInt((window.pageYOffset + 600) / 1800);
    console.log(elementNumber);

    const floatingElements = document.querySelectorAll(".floating_element");

    for (let i = 0; i <= elementNumber; i++) {
        const element = floatingElements[i];
        console.log(`${i} => `, window.getComputedStyle(element).transform);

        if (
            !element.classList.contains("show_floating_background_element") &&
            element.classList.contains("floating_background_element")
        )
            element.classList.add("show_floating_background_element");
        if (
            !element.classList.contains("show_floating_text") &&
            element.classList.contains("floating_text")
        )
            element.classList.add("show_floating_text");
    }
}

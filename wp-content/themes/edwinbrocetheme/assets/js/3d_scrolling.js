"use strict";
var INITIAL_CAMERA_POSITION = parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue("--cameraZ")
    ),
    PERSPECTIVE_ORIGIN = {
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
function MouseCameraMovement(e) {
    moveCameraAngle(
        ((100 * (e.clientX - window.innerWidth / 2)) /
            (window.innerWidth / 2)) *
            -1,
        ((100 * (e.clientY - window.innerHeight / 2)) /
            (window.innerHeight / 2)) *
            -1,
        PERSPECTIVE_ORIGIN.max_gap_desktop
    );
}
function GyroCameraMovement(e) {
    moveCameraAngle(e.gamma, e.beta, PERSPECTIVE_ORIGIN.max_gap_mobile);
}
function moveCameraAngle(e, t, n) {
    var o = PERSPECTIVE_ORIGIN.x + (e * n) / 100,
        m = PERSPECTIVE_ORIGIN.y + (t * n) / 100;
    document.documentElement.style.setProperty("--scenePerspectiveOriginX", o),
        document.documentElement.style.setProperty(
            "--scenePerspectiveOriginY",
            m
        );
}
function setSceneHeight() {
    var e = document.getElementsByClassName("floating_element").length,
        t = parseFloat(
            getComputedStyle(document.documentElement).getPropertyValue(
                "--itemZ"
            )
        ),
        n = parseFloat(
            getComputedStyle(document.documentElement).getPropertyValue(
                "--scenePerspective"
            )
        ),
        o = parseFloat(
            getComputedStyle(document.documentElement).getPropertyValue(
                "--cameraSpeed"
            )
        ),
        m = window.innerHeight + n * o + t * o * (e - 1) + 300;
    document.documentElement.style.setProperty("--viewportHeight", m);
}
function moveCamera() {
    document.documentElement.style.setProperty(
        "--cameraZ",
        window.pageYOffset + INITIAL_CAMERA_POSITION
    );
}
document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("deviceorientation", GyroCameraMovement),
        window.addEventListener("scroll", moveCamera),
        window.addEventListener("mousemove", MouseCameraMovement),
        setSceneHeight();
});

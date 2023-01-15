<?php
    if (isset($_SESSION['userRole'])) {
        if ($_SESSION['userRole'] === 'patient') {
            echo "<ul>
                <li>
                    <i class=\"fa-solid fa-book\"></i>
                    <a href=\"reservations\" class=\"button\">reservations</a>
                </li>
                <li>
                    <i class=\"fa-light fa-percent\"></i>
                    <a href=\"discounts\" class=\"button\">discounts</a>
                </li>
                <li>
                    <i class=\"fa-sharp fa-solid fa-comment-dots\"></i>
                    <a href=\"opinions\" class=\"button\">opinions</a>
                </li>
                <li>
                    <i class=\"fa-solid fa-message\"></i>
                    <a href=\"contact\" class=\"button\">contact</a>
                </li>
                <li>
                    <i class=\"fa-solid fa-circle-info\"></i>
                    <a href=\"about\" class=\"button\">about</a>
                </li>
                <li id=\"settings\">
                    <i class=\"fa-solid fa-gear\"></i>
                    <a href=\"settings\" class=\"button\">settings</a>
                </li>
                <li>
                    <i class=\"fa-solid fa-right-from-bracket\"></i>
                    <a href=\"logout\" class=\"button\">logout</a>
                </li>
            </ul>";
        } else if ($_SESSION['userRole'] === 'doctor') {
            echo "<ul>
                <li>
                    <i class=\"fa-solid fa-book\"></i>
                    <a href=\"appointments\" class=\"button\">appointments</a>
            </li>
                <li>
                    <i class=\"fa-light fa-percent\"></i>
                    <a href=\"patients\" class=\"button\">patients</a>
                </li>
                <li>
                    <i class=\"fa-solid fa-message\"></i>
                    <a href=\"contact\" class=\"button\">contact</a>
                </li>
                <li>
                    <i class=\"fa-solid fa-circle-info\"></i>
                    <a href=\"prescriptions\" class=\"button\">prescriptions</a>
                </li>
                <li id=\"settings\">
                    <i class=\"fa-solid fa-gear\"></i>
                    <a href=\"settings\" class=\"button\">settings</a>
                </li>
                <li>
                    <i class=\"fa-solid fa-right-from-bracket\"></i>
                    <a href=\"logout\" class=\"button\">logout</a>
                </li>
            </ul>";
        }
    }
?>
<a href="https://supportukrainenow.org/"><img src="https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/banner-direct.svg" width="100%"></a>

------

<p align="center">
    <img title="Laravel Zero" height="100" src="https://raw.githubusercontent.com/laravel-zero/docs/master/images/logo/laravel-zero-readme.png" />
</p>

<p align="center">
  <a href="https://github.com/laravel-zero/framework/actions"><img src="https://img.shields.io/github/workflow/status/laravel-zero/framework/Tests.svg" alt="Build Status"></img></a>
  <a href="https://packagist.org/packages/laravel-zero/framework"><img src="https://img.shields.io/packagist/dt/laravel-zero/framework.svg" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel-zero/framework"><img src="https://img.shields.io/packagist/v/laravel-zero/framework.svg?label=stable" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel-zero/framework"><img src="https://img.shields.io/packagist/l/laravel-zero/framework.svg" alt="License"></a>
</p>

<h4> <center>This is a <bold>community project</bold> and not an official Laravel one </center></h4>

Laravel Zero was created by [Nuno Maduro](https://github.com/nunomaduro) and [Owen Voke](https://github.com/owenvoke), and is a micro-framework that provides an elegant starting point for your console application. It is an **unofficial** and customized version of Laravel optimized for building command-line applications.

- Built on top of the [Laravel](https://laravel.com) components.
- Optional installation of Laravel [Eloquent](https://laravel-zero.com/docs/database/), Laravel [Logging](https://laravel-zero.com/docs/logging/) and many others.
- Supports interactive [menus](https://laravel-zero.com/docs/build-interactive-menus/) and [desktop notifications](https://laravel-zero.com/docs/send-desktop-notifications/) on Linux, Windows & MacOS.
- Ships with a [Scheduler](https://laravel-zero.com/docs/task-scheduling/) and  a [Standalone Compiler](https://laravel-zero.com/docs/build-a-standalone-application/).
- Integration with [Collision](https://github.com/nunomaduro/collision) - Beautiful error reporting

------

# hng-hashing-tool
This is a cli tool built with laravel- zero.

What the cli tool does

1. Takes in a csv file
2. Convert the csv file to CHIP-0007 compatible json
3. hashed the CHIP-0007 compatible json
4. Convert the json to array
5. Append the hash to each column
7. Convert array to json and
8. Convert the json back to csv


How to use the cli tool

1. Clone the project
2. Navigate to the directory of the project you just cloned and run composer install
3. Run php Application run
    After running php Application run the cli tool is going to ask series of question from you....YIKES dont be nervous, its just 2 questions
    
    Question 1: Hey Commrade, Whats your name?? (You are expected to specify your name in this column)
    Question 2: Path to your file Example: (C:\Users\USER\Desktop\gear.csv) Note it is prefarable if you move the csv file you want to work with to desktop folder first, so you can just edit the name of my file and add yours, trust me writing file path can be crazy sometimes
    
    Then the new csv file will be create in the same folder as the old one(something like(gearName.csv). 


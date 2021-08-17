# time-tracker-exercise
<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#next-iterations">Next iterations</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project

First of all, I would like to explain my tought process on this project and the decisions that I made:

* At first of receiving the test, I went overboard trying to implement a Symfony project with Hexagonal architecture, however this idea was scrapped after seeing the implications of implementing such an entire infraestructure for a simple application.
* I started digging arround Laravel, wich is the framework i have more knowledge about, and stumbled upon Sail, a fast, reliable way to create a Laravel project with a little Docker network containing a MySQL database and other features like a mail server, a redis container for caching and a health check for all the mentioned.
* After implementing a new Laravel project with Sail commands, I wanted to get the approach of a Web sending their needs to a little API that has connection with the database, so even the Web on future interactions could be another project on itself, which I personally think it's great for teamwork as they permit to be working on different workspaces.
* On the Front-end side, I wanted something more modern than just using laravel blade, so I installed Vue on the project so I can work component wise, and right now Laravel couples with Vue perfectly due the easiness to install it inside a Laravel project and the documentation behind it.
* Coding-wise, I feel like I could do a better job with a little more time (I will specify things I would like to have done in Next iterations), but it's my fault for getting carried away the first 3 days.


### Built With

* [Laravel](https://laravel.com)
* [Sail](https://github.com/laravel/sail)
* [Vue](https://vuejs.org/)



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* npm
  ```sh
  npm install npm@latest -g
  ```

* php (if using Windows, Linux newest distros comes already with PHP 7.4+ installed)


### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/iamTetsuShizen/time-tracker-exercise.git
   ```
2. Access inside /laravel folder
3. Copy the .env.example as .env
    ```sh
    mv .env.example .env
    ```
4. Set up the docker
    ```sh
    ./vendor/bin/sail up
    ```
    Note: you can also add the *-d* flag to start the container deatatched to the console
5. Install NPM packages
   ```sh
   npm install
   ```
6. Run a first transpilation of all the assets into the public folder
   ```sh
   npm run dev
   ```

<!-- USAGE EXAMPLES -->
## Usage

At the top of your screen you will have the task form, fill the input and then press **Start**, the timer will start and will not stop untill you click **Finish**.

After clicking the finish button, the backend stores the task and time spent, and updates the task list on the application.

Of that task list, you can check the times spent, and also delete tasks.


<!-- NEXT ITERATIONS -->
## Next iterations

Here I have a list of all the things, and necessities I came up that hasn't been implemented on the project:
* Empty task description input error gives null to the backend, therefore resulting on an error, that could be sent back in form of a custom Exception on a popup or below or avobe the component.
* Namings: I've left the common names for fear of some configuration on sail stopped working.
* CSS architecture: the styles are pretty simple, and they follow the BEM naming convention for better nesting, but it could be separated into critical CSS and non-critical css as the project iterates more, so the Web is more SEO friendly, also it can be organized as the 7-1 pattern describes (https://sass-guidelin.es/#architecture)
* More SOLID: right now the calculus for hours, minutes, and seconds are repeated over the two components that shows the time on our Web, this results in a not DRY approach, I would encapsulate that functionality into a new component and then be called by whoever needs a time related calculus.
* Testing: As the code base gets bigger and bigger, I feel like testing has to be crucial for the maintanability of the application, in form of unit testing and integration testing.
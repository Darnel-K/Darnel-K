# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/).
Versioning numbers defined as MAJOR.MINOR.PATCH

## [0.16.0] - 2018-03-20
### Fixed
- Contact form layout and size in Edge Browser

### Added
- Contact form on both home and contact page
- Social links in contact sections
- Head to contact section

### Changed
- Entire website to dark theme
- Form submit button text

## [0.15.1] - 2018-03-17
### Fixed
- Mobile nav buttons not clickable
- Wrapper draggable whilst mobile nav open
- JS Element check always active due to info being returned by jQuery at all times

### Changed
- Cleaned up Nav Sass files
- Wrapper minimum height to 100vh
- Moved HTML around
- Changed position on certain HTML elements
- Set body z-index to -2

## [0.15.0] - 2018-03-15
### Added
- Mobile Nav Menu
- NoScript Styles
- Sass Variables
- Toggle particles based on visibility (scroll position) - (visible = on, not visible = off)

### Changed
- Social Buttons Open In New Tab
- Force run scroll event on page load

## [0.14.0] - 2018-03-14
### Added
- Social Media Buttons For Facebook, Instagram

## [0.13.0] - 2018-03-13
### Added
- Social Media Buttons For Github, Twitter

### Changed
- CSS layout to CSS Grid

### Removed
- Page links that do not exist (CV, Portfolio, Projects, Get A Quote, Contact)

## [0.12.1] - 2018-03-08
### Changed
- CSS files moved to separate folder from SASS files

## [0.12.0] - 2018-03-06
### Changed
- h1, h2, h3, h4, h5, h6 font changed to 'Montserrat'
- All if statements changed to use the ternary operator '?'
- Link font changed to 'Montserrat'

## [0.11.0] - 2018-03-03
### Added
- Caching JavaScript ServiceWorker

## [0.10.1] - 2018-03-03
### Fixed
- Autoscroll on click of down arrow

## [0.10.0] - 2018-03-03
### Added
- GlobalVars class 'ExtraMetadata' Static Variable
- GenHead class 'GenExtraMetadata' function

## [0.9.0] - 2018-03-03
### Added
- GlobalVars class 'Links' Static Variable
- GenHead class 'GenLinks' function
- Variety of icons

## [0.8.0] - 2018-03-03
### Changed
- OpenGraph support added to GenHead class 'GenSocialCards' function

## [0.7.1] - 2018-03-03
### Fixed
- GenHead.class.php, undefined variable 'openGraph', line 15

## [0.7.0] - 2018-03-03
### Added
- Automated twitter metadata
- GenHead class 'GenSocialCards' function
- GlobalVars class 'Twitter' Static Variable

## [0.6.1] - 2018-03-03
### Fixed
- GenHead.class.php, undefined index 'Media', line 23
- GenHead.class.php, GenScripts, Closing Script Tag

## [0.6.0] - 2018-03-03
### Added
- GenHead class 'GenScripts' function
- GlobalVars class 'Scripts' Static Variable

## [0.5.1] - 2018-03-03
### Fixed
- Index.php undefined variabled $CSS, line 10

## [0.5.0] - 2018-03-03
### Removed
- GlobalVars.php

### Added
- GlobalVars php class
- GenHead class 'GenCSS' function
- GlobalVars class 'NavLinks' Static Variable
- GlobalVars class 'CSS' Static Variable
- GlobalVars class 'LogoPath' Static Variable

### Changed
- GenHead class functions to static functions

## [0.4.0] - 2018-03-03
### Changed
- Styles
- Renamed Navigation class to GenNav

### Added
- Class to generate html head

## [0.3.1] - 2018-03-03
### Fixed
- Only toggle nav 'fixed' class on home page

## [0.3.0] - 2018-02-27
### Changed
- Menu Bar Links
- Down Arrow Disappear Point

## [0.2.0] - 2018-02-26
### Added
- Particles JS Header Background
- Header text
- Clickable bouncing down arrow
- Auto scroll on bouncing arrow click
- Arrow fades on scroll down

### Changed
- Logo Position
- Logo size
- Nav Bar Moved To The Far Left

## [0.1.0] - 2018-02-25
### Added
- PHP class autoloader
- PHP Nav bar html generator
- Global nav links variable
- HTML Header element generator
- Index.html
- Logo
- Favicon

## [0.0.0] - 2018-02-23
### Added
- Changelog

### Changed
- [Readme](README.md)

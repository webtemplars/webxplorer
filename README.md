# webxplorer
A simple, probably unsecure, but with awesome style, web based file manager.

<div align=center>

![img](https://u.teknik.io/7ySdl.png)

[Live Demo](https://rice.capuno.es/)

</div>

## Usage
Just place the files you want inside the `dir` folder and pray to not get pwned since I would never trust php.

## Dependencies
PHP and a web server.

## Why?
I have no idea...

I saw something similar from someone showing his rice and it looked cool, so i'll probably use this to show my rice too.

## Misc

### How to do the 3d effect on hover?
```css
selector {
	transition: .3s text-shadow;
	text-shadow: 0px 0px 0 rgba(246, 5, 10, .5), 0px 0px 0 rgba(30, 242, 241, .5);
}
selector:hover {
	text-shadow: 4px 4px 0 rgba(246, 5, 10, .5), -4px -4px 0 rgba(30, 242, 241, .5);
}
```

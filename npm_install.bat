@echo off
D:\npm.cmd config set cache D:\npm-cache --global
D:\npm.cmd install --legacy-peer-deps
echo NPM install done.

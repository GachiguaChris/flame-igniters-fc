@echo off
D:\npm.cmd config set cache D:\xamp\htdocs\npm-cache --global
D:\npm.cmd install --save-dev tailwindcss@3 postcss autoprefixer @tailwindcss/forms @tailwindcss/typography --legacy-peer-deps
echo Tailwind install done.

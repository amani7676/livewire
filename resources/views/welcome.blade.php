<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>

    {{-- <script src="{{ asset('dist/app.js') }}"></script> --}}
    <div x-data="dropdown">
        <button @click="toggle">Expand</button>

        <span x-show="open">Content...</span>
    </div>

    <div x-data="dropdown">
        <button @click="toggle">Expand</button>

        <span x-show="open">Some Other Content...</span>
    </div>

    <script>
        Alpine.data('dropdown', () => ({
            open: false,

            toggle() {
                this.open = !this.open
            }
        }))
    </script>
</body>

</html>

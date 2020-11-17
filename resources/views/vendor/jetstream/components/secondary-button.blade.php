<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 rounded-md text-xs text-gray-300 tracking-widest hover:bg-gray-700 focus:outline-none active:text-white active:bg-primary transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

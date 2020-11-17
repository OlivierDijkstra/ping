<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 font-semibold rounded-md text-xs text-gray-300 tracking-widest hover:bg-gray-700 active:bg-primary active:text-white focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

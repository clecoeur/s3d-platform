<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border-secondary border-2 text-center items-center w-full px-16 py-20 bg-secondary text-white border border-transparent rounded-md font-bold font-title text-base text-white hover:bg-foreground hover:border-secondary hover:text-secondary transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

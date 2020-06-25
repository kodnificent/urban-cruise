<template>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-2/3">
            <slot></slot>
        </div>

        <div class="w-full lg:w-1/3 lg:pl-8 mt-8 lg:mt-0 md:w-2/3 md:mx-auto">
            <slot name="sidebar">
                <sidebar />
            </slot>
        </div>
    </div>
</template>

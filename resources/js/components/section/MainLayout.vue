<template>
    <div class="py-8 flex flex-wrap">
        <div class="w-full lg:w-2/3">
            <slot></slot>
        </div>

        <div class="w-full lg:w-1/3">
            <sidebar />
        </div>
    </div>
</template>

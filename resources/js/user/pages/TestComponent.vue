<template>
    <div class="avatar-group flex ai-center">
        <div v-for="(avatar, index) in avatars" :key="index"
         class="avatar-container position-relative m-l-px--10 avatar-container'" >
            <img :src="avatar.src"
             class="avatar-img  w-px-50 h-px-50 rounded-full border border-2  border-white object-fit-cove" alt="User Avatar">
        </div>
    </div>
    </template>
    
    <script>
    export default {
        data() {
            return {
                avatars: [{
                        name: 'Ali',
                        src: 'https://randomuser.me/api/portraits/men/32.jpg',
                        bgColor: 'bg-purple'
                    },
                    {
                        name: 'Osman',
                        src: 'https://randomuser.me/api/portraits/women/44.jpg',
                        bgColor: 'bg-green'
                    },
                    {
                        name: 'Muhammad',
                        src: 'https://randomuser.me/api/portraits/men/47.jpg',
                        bgColor: 'bg-blue'
                    },
                    {
                        name: 'Abbas',
                        src: 'https://randomuser.me/api/portraits/women/49.jpg',
                        bgColor: 'bg-pink'
                    },
                    {
                        name: 'Raza',
                        src: 'https://randomuser.me/api/portraits/women/49.jpg',
                        bgColor: 'bg-pink'
                    }
                ]
            };
        }
    };
    </script>
    
    <style scoped>
  
    </style>
    
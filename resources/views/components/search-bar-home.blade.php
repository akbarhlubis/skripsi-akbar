<div class="flex flex-col items-center w-full" x-data="{ events: [], keywords: '' }"
    x-effect="fetch('search?q='+keywords)
    .then(response => response.json())
    .then(data => events = data)"
    >
    <div class="w-full input-group">
        <input class="w-full text-sm input input-bordered" x-model="keywords" placeholder="Tuliskan nama atau kategori kegiatan..." type="search" name="search" id="search">
        <span class="input-group-lg">
            <i class="bi bi-search"></i>
        </span>
    </div>
    <div x-show="keywords && events.length > 0" class="absolute z-50 flex flex-col w-1/2 gap-4 mt-16 md:w-1/3 ">
        <template x-for="event in events">
                <a class="flex flex-col w-full p-3 bg-white border rounded-lg shadow hover:bg-primary-focus hover:text-white" x-bind:href="'posts/'+event.slug">
                    <p x-text="event.name" class="mb-2 text-xs font-bold md:text-base"></p>
                    <p x-text="event.description" class="text-xs">tes</p>
                </a>
        </template>
    </div>
</div>

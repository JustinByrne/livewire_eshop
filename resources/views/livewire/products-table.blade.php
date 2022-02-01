<div class="grid lg:grid-cols-3 xl:grid-cols-4">
    <div class="sm:pb-3 lg:pb-0">
        <div class="py-2 lg:border-b" x-data="{ open: false }">
            <fieldset>
                <legend class="w-full px-2">
                    <button type="button" class="w-full p-2 flex items-center justify-between text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false" x-on:click="open = !open">
                        <span class="text-sm font-medium text-gray-900">
                            Category
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-5 w-5 transform transition" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" x-bind:class="{ '-rotate-180' : open, 'rotate-0' : ! open }">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                </legend>
                <div class="pt-4 pb-2 px-4" id="filter-section-0" x-bind:class="{ 'hidden' : ! open }" x-cloak>
                    <div class="space-y-6">
                        @foreach ($categories as $category)
                            <div class="flex items-center">
                                <input id="category-{{ $category->id }}" wire:model="categories_filter" value="{{ $category->id }}" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="category-{{ $category->id }}" class="ml-3 text-sm text-gray-500">
                                    {{ $category->name }} ({{ $category->products_count }})
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="py-2 lg:border-b" x-data="{ open: false }">
            <fieldset>
                <legend class="w-full px-2">
                    <button type="button" class="w-full p-2 flex items-center justify-between text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false" x-on:click="open = !open">
                        <span class="text-sm font-medium text-gray-900">
                            Price
                        </span>
                        <span class="ml-6 h-7 flex items-center">
                            <svg class="h-5 w-5 transform transition" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" x-bind:class="{ '-rotate-180' : open, 'rotate-0' : ! open }">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                </legend>
                <div class="pt-4 pb-2 px-4" id="filter-section-0" x-bind:class="{ 'hidden' : ! open }" x-cloak>
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <input id="price-1" name="pricing" wire:model="pricing" value="0,50" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500 rounded-full">
                            <label for="price-1" class="ml-3 text-sm text-gray-500">
                                £0 - £50
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="price-2" name="pricing" wire:model="pricing" value="50,100" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500 rounded-full">
                            <label for="price-2" class="ml-3 text-sm text-gray-500">
                                £50 - £100
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="price-3" name="pricing" wire:model="pricing" value="150,200" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500 rounded-full">
                            <label for="price-3" class="ml-3 text-sm text-gray-500">
                                £150 - £200
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="lg:col-span-2 xl:col-span-3">
        <div class="max-w-7xl mx-auto overflow-hidden sm:px-6 lg:px-8">
            <h2 class="sr-only">Products</h2>
        
            <div class="-mx-px border-l border-t border-gray-200 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $product)
                    <div class="group relative p-4 border-r border-b border-gray-200 sm:p-6">
                        <div class="rounded-lg overflow-hidden bg-gray-200 aspect-w-1 aspect-h-1 group-hover:opacity-75">
                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-05-image-card-01.jpg" alt="TODO" class="w-full h-full object-center object-cover">
                        </div>
                        <div class="pt-10 pb-4 text-center">
                            <h3 class="text-sm font-medium text-gray-900">
                                <a href="{{ route('products.show', $product) }}">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="text-base font-medium text-gray-900">
                                £{{ number_format($product->price/100,2) }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
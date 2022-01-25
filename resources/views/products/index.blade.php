<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="grid lg:grid-cols-3 xl:grid-cols-4">
                        <div>
                            filters
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

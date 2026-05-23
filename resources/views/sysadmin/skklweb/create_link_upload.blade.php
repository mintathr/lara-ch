<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload dengan FilePond</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- FilePond Stylesheets -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <style>
        .filepond--credits {
            display: none !important;
        }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-3xl p-8 bg-white rounded-3xl shadow-2xl border border-gray-100 backdrop-blur-sm bg-white/90">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Update Link uTube
            </h2>
            <p class="text-sm text-gray-500 mt-1">lengkapi data di bawah ini dan drop file wj & taib.</p>
        </div>

        <!-- ==================== FORM INPUT SEDERHANA ==================== -->
        <form role="form" class="col s12" method="POST" action="{{ route('web.linkutubeUpdate', ['id' => $utube->id]) }}">
            @method('patch')
            @csrf
            <div class="space-y-5 mb-6 pb-6 border-b border-gray-100">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Link uTube
                    </label>
                    <div class="flex rounded-xl shadow-sm overflow-hidden border border-gray-200 bg-gray-50/50 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 focus-within:bg-white transition-all">
                        <span class="inline-flex items-center px-3 border-r border-gray-200 bg-gray-100 text-gray-500 text-sm select-none whitespace-nowrap">
                            https://youtube.com/watch?v=
                        </span>
                        <input type="text" id="linkUtube" name="link_utube" value="{{ $utube->link_utube ?? '' }}" placeholder="ID_Video" 
                            class="block w-full px-4 py-3 bg-transparent text-sm placeholder-gray-400 focus:outline-none">
                    </div>
                    <!-- <div class="relative rounded-xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <i class="fab fa-youtube text-lg text-red-500"></i>
                        </div>
                        <input type="text" id="linkUtube" name="link_utube" placeholder="masukkan link utube setelah /watch?v=..." 
                            class="block w-full pl-11 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all" value="{{ $utube->link_utube }}">
                    </div> -->
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Keterangan
                    </label>
                    <input type="text" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan..." 
                        class="block w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all" value="{{ $utube->keterangan }}">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Sub Header
                    </label>
                    <input type="text" id="subHeader" name="sub_header" placeholder="Masukkan sub judul atau bab..." 
                        class="block w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all" value="{{ $utube->sub_header }}">
                </div>
                <div>
                    <button type="submit" 
                        class="w-full relative flex items-center justify-center gap-2 px-6 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 active:scale-[0.98] text-white font-bold text-sm uppercase tracking-wider rounded-xl shadow-lg shadow-blue-500/20 hover:shadow-indigo-500/30 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <span>Submit</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>

        <div class="relative flex py-2 items-center mb-4">
            <div class="flex-grow border-t border-red-700"></div>
            <span class="flex-shrink mx-4 text-xs font-bold text-red-700 uppercase tracking-widest bg-white px-2">
                UPLOAD WJ & TAIB
            </span>
            <div class="flex-grow border-t border-red-700"></div>
        </div>
    <!-- ==================== PILIHAN KATEGORI ==================== -->
        <div class="mb-6">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-3">
                Pilih Kategori
            </label>
            <div class="grid grid-cols-2 gap-4">
                <label id="label-wj" class="group relative flex items-center justify-between p-4 bg-gray-50 border-2 border-gray-200 rounded-2xl cursor-pointer hover:bg-blue-50/30 hover:border-blue-500 transition-all duration-200 class-active-wj">
                    <input type="radio" name="kategori" value="wj" class="sr-only" checked>
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-800 text-base">WJ</span>
                        <span class="text-xs text-gray-400 group-hover:text-blue-500 transition-colors">Kategori Dokumen WJ</span>
                    </div>
                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center group-hover:border-blue-500 radio-dot">
                        <div class="w-2.5 h-2.5 rounded-full bg-blue-600 hidden dot-inner"></div>
                    </div>
                </label>
                
                <label id="label-taib" class="group relative flex items-center justify-between p-4 bg-gray-50 border-2 border-gray-200 rounded-2xl cursor-pointer hover:bg-blue-50/30 hover:border-blue-500 transition-all duration-200">
                    <input type="radio" name="kategori" value="taib" class="sr-only">
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-800 text-base">TAIB</span>
                        <span class="text-xs text-gray-400 group-hover:text-blue-500 transition-colors">Kategori Dokumen TAIB</span>
                    </div>
                    <div class="w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center group-hover:border-blue-500 radio-dot">
                        <div class="w-2.5 h-2.5 rounded-full bg-blue-600 hidden dot-inner"></div>
                    </div>
                </label>
            </div>
        </div>

        <!-- ==================== AREA DROP FILEPOND ==================== -->
        <div class="disabled-pond opacity-40 pointer-events-none transition-all duration-300 transform scale-98" id="pond-wrapper">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                Upload File PDF
            </label>
            <div class="rounded-2xl overflow-hidden border border-dashed border-gray-300 bg-gray-50/30 p-1">
                <input type="file" class="filepond" name="filepond" accept="application/pdf" data-max-file-size="2MB">
            </div>
        </div>
    </div>

    <!-- FilePond JavaScript -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        // Registrasi plugin validasi tipe file ke FilePond
        FilePond.registerPlugin(FilePondPluginFileValidateType);

        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement, {
            // Beri pesan kustom jika user nekat drop file non-PDF
            labelFileTypeNotAllowed: 'File bukan PDF',
            fileValidateTypeLabelExpectedTypes: 'Hanya menerima file .pdf'
        });

        let kategoriTerpilih = '';

        function updateFilePondServer(kategori) {
            pond.setOptions({
                server: {
                    process: {
                        url: `/uploadtaib?kategori=${kategori}`,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        // Menangani error dari Laravel jika lolos validasi client-side
                        onerror: (response) => {
                            const res = JSON.parse(response);
                            return res.error || 'Gagal mengunggah file';
                        }
                    }
                }
            });
            
            document.getElementById('pond-wrapper').classList.remove('opacity-50', 'pointer-events-none');
        }

        // (Sisa script radio button kategori tetap sama seperti sebelumnya...)
        const radios = document.querySelectorAll('input[name="kategori"]');
        radios.forEach(radio => {
            if(radio.checked) {
                radio.parentElement.classList.add('border-blue-500', 'bg-blue-50');
                kategoriTerpilih = radio.value;
                updateFilePondServer(kategoriTerpilih);
            }
            radio.addEventListener('change', function() {
                radios.forEach(r => r.parentElement.classList.remove('border-blue-500', 'bg-blue-50'));
                if(this.checked) {
                    this.parentElement.classList.add('border-blue-500', 'bg-blue-50');
                    kategoriTerpilih = this.value;
                    updateFilePondServer(kategoriTerpilih);
                }
            });
        });
    </script>
</body>
</html>
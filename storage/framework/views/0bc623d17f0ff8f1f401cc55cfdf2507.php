<?php $__env->startSection('title', 'Tambah Penduduk'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">

    <!-- Action Bar -->
    <div class="flex items-center justify-end">
        <a href="<?php echo e(route('admin.penduduk')); ?>"
            class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Data Penduduk Baru</h3>
            <p class="text-sm text-gray-500 mt-1">Lengkapi formulir di bawah ini untuk menambahkan penduduk baru</p>
        </div>

        <form action="<?php echo e(route('admin.penduduk.store')); ?>" method="POST" class="p-6">
            <?php echo csrf_field(); ?>

            <!-- Informasi Dasar -->
            <div class="mb-8">
                <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-6 h-6 bg-emerald-100 rounded-lg flex items-center justify-center">
                        <span class="text-emerald-700 text-xs font-bold">1</span>
                    </div>
                    Informasi Dasar
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block text-xs font-medium text-gray-700 mb-2">
                            NIK <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nik" name="nik" value="<?php echo e(old('nik')); ?>"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Masukkan NIK 16 digit" required maxlength="16">
                        <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="nama" class="block text-xs font-medium text-gray-700 mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nama" name="nama" value="<?php echo e(old('nama')); ?>"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Masukkan nama lengkap" required>
                        <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin" class="block text-xs font-medium text-gray-700 mb-2">
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L" <?php echo e(old('jenis_kelamin')=='L' ? 'selected' : ''); ?>>Laki-laki</option>
                            <option value="P" <?php echo e(old('jenis_kelamin')=='P' ? 'selected' : ''); ?>>Perempuan</option>
                        </select>
                        <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label for="tempat_lahir" class="block text-xs font-medium text-gray-700 mb-2">
                            Tempat Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo e(old('tempat_lahir')); ?>"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Contoh: Jakarta" required>
                        <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-xs font-medium text-gray-700 mb-2">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo e(old('tanggal_lahir')); ?>"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                        <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Golongan Darah -->
                    <div>
                        <label for="golongan_darah" class="block text-xs font-medium text-gray-700 mb-2">
                            Golongan Darah
                        </label>
                        <select id="golongan_darah" name="golongan_darah"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="">Pilih golongan darah</option>
                            <option value="A" <?php echo e(old('golongan_darah')=='A' ? 'selected' : ''); ?>>A</option>
                            <option value="B" <?php echo e(old('golongan_darah')=='B' ? 'selected' : ''); ?>>B</option>
                            <option value="AB" <?php echo e(old('golongan_darah')=='AB' ? 'selected' : ''); ?>>AB</option>
                            <option value="O" <?php echo e(old('golongan_darah')=='O' ? 'selected' : ''); ?>>O</option>
                        </select>
                        <?php $__errorArgs = ['golongan_darah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Agama -->
                    <div>
                        <label for="agama" class="block text-xs font-medium text-gray-700 mb-2">
                            Agama <span class="text-red-500">*</span>
                        </label>
                        <select id="agama" name="agama"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                            <option value="">Pilih agama</option>
                            <option value="Islam" <?php echo e(old('agama')=='Islam' ? 'selected' : ''); ?>>Islam</option>
                            <option value="Kristen" <?php echo e(old('agama')=='Kristen' ? 'selected' : ''); ?>>Kristen</option>
                            <option value="Katolik" <?php echo e(old('agama')=='Katolik' ? 'selected' : ''); ?>>Katolik</option>
                            <option value="Hindu" <?php echo e(old('agama')=='Hindu' ? 'selected' : ''); ?>>Hindu</option>
                            <option value="Budha" <?php echo e(old('agama')=='Budha' ? 'selected' : ''); ?>>Budha</option>
                            <option value="Konghucu" <?php echo e(old('agama')=='Konghucu' ? 'selected' : ''); ?>>Konghucu</option>
                        </select>
                        <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Kewarganegaraan -->
                    <div>
                        <label for="kewarganegaraan" class="block text-xs font-medium text-gray-700 mb-2">
                            Kewarganegaraan
                        </label>
                        <select id="kewarganegaraan" name="kewarganegaraan"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="WNI" <?php echo e(old('kewarganegaraan', 'WNI' )=='WNI' ? 'selected' : ''); ?>>WNI
                            </option>
                            <option value="WNA" <?php echo e(old('kewarganegaraan')=='WNA' ? 'selected' : ''); ?>>WNA</option>
                        </select>
                        <?php $__errorArgs = ['kewarganegaraan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Informasi Keluarga & Wilayah -->
            <div class="mb-8">
                <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center">
                        <span class="text-blue-700 text-xs font-bold">2</span>
                    </div>
                    Informasi Keluarga & Wilayah
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                    <!-- Keluarga -->
                    <div>
                        <label for="keluarga_id" class="block text-xs font-medium text-gray-700 mb-2">
                            Keluarga
                        </label>
                        <select id="keluarga_id" name="keluarga_id"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="">Pilih keluarga (opsional)</option>
                            <?php $__currentLoopData = $keluarga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k->id); ?>" <?php echo e(old('keluarga_id')==$k->id ? 'selected' : ''); ?>>
                                <?php echo e($k->no_kk); ?> - <?php echo e($k->kepalaKeluarga->nama ?? 'N/A'); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['keluarga_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Hubungan Keluarga -->
                    <div>
                        <label for="hubungan_keluarga" class="block text-xs font-medium text-gray-700 mb-2">
                            Hubungan Keluarga
                        </label>
                        <select id="hubungan_keluarga" name="hubungan_keluarga"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="">Pilih hubungan (opsional)</option>
                            <option value="kepala_keluarga" <?php echo e(old('hubungan_keluarga')=='kepala_keluarga' ? 'selected' : ''); ?>>Kepala Keluarga</option>
                            <option value="istri" <?php echo e(old('hubungan_keluarga')=='istri' ? 'selected' : ''); ?>>Istri</option>
                            <option value="anak" <?php echo e(old('hubungan_keluarga')=='anak' ? 'selected' : ''); ?>>Anak</option>
                            <option value="orang_tua" <?php echo e(old('hubungan_keluarga')=='orang_tua' ? 'selected' : ''); ?>>Orang Tua</option>
                            <option value="saudara" <?php echo e(old('hubungan_keluarga')=='saudara' ? 'selected' : ''); ?>>Saudara</option>
                            <option value="lainnya" <?php echo e(old('hubungan_keluarga')=='lainnya' ? 'selected' : ''); ?>>Lainnya</option>
                        </select>
                        <?php $__errorArgs = ['hubungan_keluarga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Rumah Tangga -->
                    <div>
                        <label for="rumah_tangga_id" class="block text-xs font-medium text-gray-700 mb-2">
                            Rumah Tangga
                        </label>
                        <select id="rumah_tangga_id" name="rumah_tangga_id"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="">Pilih rumah tangga (opsional)</option>
                            <?php $__currentLoopData = $rumahTangga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($rt->id); ?>" <?php echo e(old('rumah_tangga_id')==$rt->id ? 'selected' : ''); ?>>
                                <?php echo e($rt->nama_kepala_rumah_tangga ?? 'N/A'); ?> - <?php echo e($rt->alamat); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['rumah_tangga_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Hubungan Rumah Tangga -->
                    <div>
                        <label for="hubungan_rumah_tangga" class="block text-xs font-medium text-gray-700 mb-2">
                            Hubungan Rumah Tangga
                        </label>
                        <select id="hubungan_rumah_tangga" name="hubungan_rumah_tangga"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="">Pilih hubungan (opsional)</option>
                            <option value="kepala_rumah_tangga" <?php echo e(old('hubungan_rumah_tangga')=='kepala_rumah_tangga' ? 'selected' : ''); ?>>Kepala Rumah Tangga</option>
                            <option value="istri" <?php echo e(old('hubungan_rumah_tangga')=='istri' ? 'selected' : ''); ?>>Istri</option>
                            <option value="anak" <?php echo e(old('hubungan_rumah_tangga')=='anak' ? 'selected' : ''); ?>>Anak</option>
                            <option value="orang_tua" <?php echo e(old('hubungan_rumah_tangga')=='orang_tua' ? 'selected' : ''); ?>>Orang Tua</option>
                            <option value="saudara" <?php echo e(old('hubungan_rumah_tangga')=='saudara' ? 'selected' : ''); ?>>Saudara</option>
                            <option value="lainnya" <?php echo e(old('hubungan_rumah_tangga')=='lainnya' ? 'selected' : ''); ?>>Lainnya</option>
                        </select>
                        <?php $__errorArgs = ['hubungan_rumah_tangga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Wilayah -->
                    <div>
                        <label for="wilayah_id" class="block text-xs font-medium text-gray-700 mb-2">
                            Wilayah
                        </label>
                        <select id="wilayah_id" name="wilayah_id"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="">Pilih wilayah (opsional)</option>
                            <?php $__currentLoopData = $wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $w): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($w->id); ?>" <?php echo e(old('wilayah_id')==$w->id ? 'selected' : ''); ?>>
                                RT <?php echo e($w->rt); ?> / RW <?php echo e($w->rw); ?> - <?php echo e($w->dusun); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['wilayah_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Status & Pendidikan -->
            <div class="mb-8">
                <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-6 h-6 bg-purple-100 rounded-lg flex items-center justify-center">
                        <span class="text-purple-700 text-xs font-bold">3</span>
                    </div>
                    Status & Pendidikan
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Status Hidup -->
                    <div>
                        <label for="status_hidup" class="block text-xs font-medium text-gray-700 mb-2">
                            Status Hidup
                        </label>
                        <select id="status_hidup" name="status_hidup"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="hidup" <?php echo e(old('status_hidup', 'hidup' )=='hidup' ? 'selected' : ''); ?>>Hidup
                            </option>
                            <option value="meninggal" <?php echo e(old('status_hidup')=='meninggal' ? 'selected' : ''); ?>>Meninggal
                            </option>
                        </select>
                        <?php $__errorArgs = ['status_hidup'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Status Kawin -->
                    <div>
                        <label for="status_kawin" class="block text-xs font-medium text-gray-700 mb-2">
                            Status Kawin <span class="text-red-500">*</span>
                        </label>
                        <select id="status_kawin" name="status_kawin"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors <?php $__errorArgs = ['status_kawin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                            <option value="">Pilih status</option>
                            <option value="Belum Kawin" <?php echo e(old('status_kawin')=='Belum Kawin' ? 'selected' : ''); ?>>Belum
                                Kawin</option>
                            <option value="Kawin" <?php echo e(old('status_kawin')=='Kawin' ? 'selected' : ''); ?>>Kawin</option>
                            <option value="Cerai Hidup" <?php echo e(old('status_kawin')=='Cerai Hidup' ? 'selected' : ''); ?>>Cerai
                                Hidup</option>
                            <option value="Cerai Mati" <?php echo e(old('status_kawin')=='Cerai Mati' ? 'selected' : ''); ?>>Cerai
                                Mati</option>
                        </select>
                        <?php $__errorArgs = ['status_kawin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Pendidikan -->
                    <div>
                        <label for="pendidikan" class="block text-xs font-medium text-gray-700 mb-2">
                            Pendidikan Terakhir
                        </label>
                        <select id="pendidikan" name="pendidikan"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors">
                            <option value="">Pilih pendidikan</option>
                            <option value="Tidak Sekolah" <?php echo e(old('pendidikan')=='Tidak Sekolah' ? 'selected' : ''); ?>>
                                Tidak Sekolah</option>
                            <option value="SD" <?php echo e(old('pendidikan')=='SD' ? 'selected' : ''); ?>>SD</option>
                            <option value="SMP" <?php echo e(old('pendidikan')=='SMP' ? 'selected' : ''); ?>>SMP</option>
                            <option value="SMA" <?php echo e(old('pendidikan')=='SMA' ? 'selected' : ''); ?>>SMA</option>
                            <option value="D1" <?php echo e(old('pendidikan')=='D1' ? 'selected' : ''); ?>>D1</option>
                            <option value="D2" <?php echo e(old('pendidikan')=='D2' ? 'selected' : ''); ?>>D2</option>
                            <option value="D3" <?php echo e(old('pendidikan')=='D3' ? 'selected' : ''); ?>>D3</option>
                            <option value="S1" <?php echo e(old('pendidikan')=='S1' ? 'selected' : ''); ?>>S1</option>
                            <option value="S2" <?php echo e(old('pendidikan')=='S2' ? 'selected' : ''); ?>>S2</option>
                            <option value="S3" <?php echo e(old('pendidikan')=='S3' ? 'selected' : ''); ?>>S3</option>
                        </select>
                        <?php $__errorArgs = ['pendidikan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Pekerjaan -->
                    <div>
                        <label for="pekerjaan" class="block text-xs font-medium text-gray-700 mb-2">
                            Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <select id="pekerjaan" name="pekerjaan"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>
                            <option value="">Pilih pekerjaan</option>
                            <option value="bekerja" <?php echo e(old('pekerjaan')=='bekerja' ? 'selected' : ''); ?>>Bekerja</option>
                            <option value="tidak bekerja" <?php echo e(old('pekerjaan')=='tidak bekerja' ? 'selected' : ''); ?>>
                                Tidak Bekerja</option>
                        </select>
                        <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Kontak & Alamat -->
            <div class="mb-8">
                <h4 class="text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-6 h-6 bg-pink-100 rounded-lg flex items-center justify-center">
                        <span class="text-pink-700 text-xs font-bold">4</span>
                    </div>
                    Kontak & Alamat
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- No. Telepon -->
                    <div>
                        <label for="no_telp" class="block text-xs font-medium text-gray-700 mb-2">
                            No. Telepon
                        </label>
                        <input type="text" id="no_telp" name="no_telp" value="<?php echo e(old('no_telp')); ?>"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                            placeholder="Contoh: 08123456789">
                        <?php $__errorArgs = ['no_telp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                            placeholder="contoh@email.com">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Alamat - Full Width -->
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-xs font-medium text-gray-700 mb-2">
                            Alamat Lengkap
                        </label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                            placeholder="Masukkan alamat lengkap..."><?php echo e(old('alamat')); ?></textarea>
                        <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200">
                <a href="<?php echo e(route('admin.penduduk')); ?>"
                    class="px-6 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors shadow-sm">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // Auto-format NIK input (numbers only, max 16 digits)
    document.getElementById('nik')?.addEventListener('input', function(e) {
        this.value = this.value.replace(/\D/g, '').substring(0, 16);
    });

    // Auto-format phone number
    document.getElementById('no_telp')?.addEventListener('input', function(e) {
        this.value = this.value.replace(/\D/g, '');
    });

    // Form validation feedback
    const form = document.querySelector('form');
    form?.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('border-red-500');
            } else {
                field.classList.remove('border-red-500');
            }
        });

        if (!isValid) {
            e.preventDefault();
            // Scroll to first error
            const firstError = form.querySelector('.border-red-500');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstError.focus();
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\lumbung-data\resources\views/admin/penduduk-create.blade.php ENDPATH**/ ?>
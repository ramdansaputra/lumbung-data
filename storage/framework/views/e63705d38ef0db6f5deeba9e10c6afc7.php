

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Edit APBDes</h1>
                <p class="text-slate-600">Edit data anggaran pendapatan atau belanja desa</p>
            </div>
            <a href="<?php echo e(route('admin.keuangan.apbdes')); ?>"
                class="px-4 py-2 bg-slate-500 text-white rounded-lg hover:bg-slate-600 transition">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
        <div class="flex items-center mb-2">
            <i class="fas fa-exclamation-triangle mr-3"></i>
            <span class="font-semibold">Terdapat kesalahan:</span>
        </div>
        <ul class="list-disc list-inside ml-6 text-sm">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
            <li><?php echo e($error); ?></li>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </ul>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Info Realisasi yang sudah ada -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($apbdes->realisasi->count() > 0): ?>
    <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg">
        <div class="flex items-center">
            <i class="fas fa-info-circle mr-3"></i>
            <span>
                Sudah ada <strong><?php echo e($apbdes->realisasi->count()); ?> realisasi</strong>
                senilai <strong>Rp <?php echo e(number_format($apbdes->total_realisasi, 0, ',', '.')); ?></strong>.
                Perubahan anggaran tidak akan mempengaruhi data realisasi yang sudah ada.
            </span>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
        <form action="<?php echo e(route('admin.keuangan.apbdes.update', $apbdes->id)); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tahun Anggaran -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Tahun Anggaran <span class="text-red-500">*</span>
                    </label>
                    <select name="tahun_id"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        required>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tahunAnggaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option value="<?php echo e($tahun->id); ?>" <?php echo e(old('tahun_id', $apbdes->tahun_id) == $tahun->id ?
                            'selected' : ''); ?>>
                            <?php echo e($tahun->tahun); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tahun->status === 'aktif'): ?> (Aktif) <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select name="kategori"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        required>
                        <option value="pendapatan" <?php echo e(old('kategori', $apbdes->kategori) == 'pendapatan' ? 'selected' :
                            ''); ?>>
                            Pendapatan
                        </option>
                        <option value="belanja" <?php echo e(old('kategori', $apbdes->kategori) == 'belanja' ? 'selected' : ''); ?>>
                            Belanja
                        </option>
                    </select>
                </div>
            </div>

            <!-- Bidang → Kegiatan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Bidang Anggaran</label>
                    <select id="bidangSelect"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">Pilih Bidang</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                        <option value="<?php echo e($b->id); ?>" <?php echo e($apbdes->kegiatanAnggaran &&
                            $apbdes->kegiatanAnggaran->bidang_id == $b->id ? 'selected' : ''); ?>>
                            <?php echo e($b->nama_bidang); ?>

                        </option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Kegiatan <span class="text-red-500">*</span>
                    </label>
                    <select name="kegiatan_id" id="kegiatanSelect"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                        required>
                        <!-- Opsi awal: tampilkan kegiatan yang sedang dipilih -->
                        <option value="<?php echo e($apbdes->kegiatan_id); ?>" selected>
                            <?php echo e($apbdes->kegiatanAnggaran->nama_kegiatan ?? 'Kegiatan Saat Ini'); ?>

                        </option>
                    </select>
                </div>
            </div>

            <!-- Sumber Dana -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Sumber Dana <span class="text-red-500">*</span>
                </label>
                <select name="sumber_dana_id"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                    required>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $sumberDana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoop($loop->index); ?><?php endif; ?>
                    <option value="<?php echo e($sd->id); ?>" <?php echo e(old('sumber_dana_id', $apbdes->sumber_dana_id) == $sd->id ?
                        'selected' : ''); ?>>
                        <?php echo e($sd->nama_sumber); ?>

                    </option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
            </div>

            <!-- Jumlah Anggaran -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Jumlah Anggaran (Rp) <span class="text-red-500">*</span>
                </label>
                <input type="number" name="anggaran" value="<?php echo e(old('anggaran', $apbdes->anggaran)); ?>" min="1"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                    required>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($apbdes->total_realisasi > 0): ?>
                <p class="mt-1 text-xs text-amber-600">
                    <i class="fas fa-exclamation-triangle mr-1"></i>
                    Anggaran tidak boleh kurang dari total realisasi
                    (Rp <?php echo e(number_format($apbdes->total_realisasi, 0, ',', '.')); ?>)
                </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- Info Saldo -->
            <div class="bg-slate-50 rounded-lg p-4 text-sm grid grid-cols-3 gap-4">
                <div>
                    <p class="text-slate-500">Anggaran</p>
                    <p class="font-semibold text-slate-800">Rp <?php echo e(number_format($apbdes->anggaran, 0, ',', '.')); ?></p>
                </div>
                <div>
                    <p class="text-slate-500">Terealisasi</p>
                    <p class="font-semibold text-blue-600">Rp <?php echo e(number_format($apbdes->total_realisasi, 0, ',', '.')); ?>

                    </p>
                </div>
                <div>
                    <p class="text-slate-500">Sisa</p>
                    <p class="font-semibold text-emerald-600">
                        Rp <?php echo e(number_format($apbdes->anggaran - $apbdes->total_realisasi, 0, ',', '.')); ?>

                    </p>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                <a href="<?php echo e(route('admin.keuangan.apbdes')); ?>"
                    class="px-4 py-2 bg-slate-500 text-white rounded-lg hover:bg-slate-600 transition">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const kegiatanData = {
    <?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($b->id); ?>: [
        <?php $__currentLoopData = $b->kegiatanAnggaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        { id: <?php echo e($k->id); ?>, nama: "<?php echo e(addslashes($k->nama_kegiatan)); ?>" },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ],
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
};

const currentKegiatanId = <?php echo e($apbdes->kegiatan_id); ?>;

document.getElementById('bidangSelect').addEventListener('change', function () {
    const bidangId = this.value;
    const kegiatanSelect = document.getElementById('kegiatanSelect');
    kegiatanSelect.innerHTML = '<option value="">Pilih Kegiatan</option>';

    if (bidangId && kegiatanData[bidangId]) {
        kegiatanData[bidangId].forEach(function (k) {
            const opt = document.createElement('option');
            opt.value = k.id;
            opt.textContent = k.nama;
            if (k.id == currentKegiatanId) opt.selected = true;
            kegiatanSelect.appendChild(opt);
        });
    }
});

// Auto-trigger saat load jika bidang sudah dipilih
const bidangSelect = document.getElementById('bidangSelect');
if (bidangSelect.value) {
    bidangSelect.dispatchEvent(new Event('change'));
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\LumbungData\resources\views/admin/keuangan/laporan-apbdes-edit.blade.php ENDPATH**/ ?>
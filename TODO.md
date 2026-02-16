# TODO: Tailwind CSS for Kesehatan Section

## Task
Create clean and consistent Tailwind CSS for the kesehatan section (Pendataan, Pemantauan, Vaccin, Stunting) with emerald-teal theme.

## Information Gathered
- Tailwind CSS v4.1.18 is already installed
- Current files use Bootstrap classes (card, btn, badge, table, form-control, etc.)
- The project uses Laravel Blade templates
- Need to convert to Tailwind with emerald (primary) and teal (secondary) colors

## Color Scheme
- Primary: emerald-500 (#10b981), emerald-600 (#059669), emerald-700 (#047857)
- Secondary: teal-500 (#14b8a6), teal-600 (#0d9488), teal-700 (#0f766e)
- Background: gray-50, gray-100, white
- Text: gray-700, gray-900, white
- Accent: cyan, sky for variety

## Bootstrap to Tailwind Mapping
- `card` → `bg-white rounded-xl shadow-sm border border-gray-200`
- `card-header` → `px-6 py-4 border-b border-gray-200 bg-gray-50 rounded-t-xl`
- `card-body` → `p-6`
- `card-footer` → `px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-xl`
- `btn btn-primary` → `bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg font-medium transition-colors`
- `btn btn-sm` → `px-3 py-1.5 text-sm`
- `btn btn-success` → `bg-emerald-600 hover:bg-emerald-700`
- `btn btn-danger` → `bg-red-600 hover:bg-red-700`
- `btn btn-warning` → `bg-amber-500 hover:bg-amber-600`
- `btn btn-info` → `bg-teal-600 hover:bg-teal-700`
- `btn btn-secondary` → `bg-gray-200 hover:bg-gray-300 text-gray-700`
- `badge badge-success` → `bg-emerald-100 text-emerald-700 px-2.5 py-0.5 rounded-full text-xs font-medium`
- `badge badge-danger` → `bg-red-100 text-red-700 px-2.5 py-0.5 rounded-full text-xs font-medium`
- `badge badge-warning` → `bg-amber-100 text-amber-700 px-2.5 py-0.5 rounded-full text-xs font-medium`
- `badge badge-info` → `bg-teal-100 text-teal-700 px-2.5 py-0.5 rounded-full text-xs font-medium`
- `table` → `w-full text-sm text-left`
- `thead` → `bg-emerald-50 text-emerald-700`
- `form-control` → `w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500`
- `nav nav-pills` → `flex gap-2 p-2 bg-gray-100 rounded-lg`
- `nav-link` → `px-4 py-2 rounded-md transition-colors`
- `nav-link active` → `bg-emerald-600 text-white`
- `alert alert-success` → `bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg`
- `alert alert-danger` → `bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg`
- `small-box` → `bg-white rounded-xl shadow-sm border border-gray-200 p-6`
- `info-box` → `bg-white rounded-xl shadow-sm border border-gray-200 p-4 flex items-center`
- `progress` → `h-2 bg-gray-200 rounded-full overflow-hidden`
- `progress-bar` → `h-full bg-emerald-500 rounded-full`

## Steps

### 1. Update Navigation (_nav.blade.php)
- [ ] Update `resources/views/admin/kesehatan/_nav.blade.php` to use Tailwind CSS

### 2. Update Pendataan Views
- [ ] Update `resources/views/admin/kesehatan/pendataan/posyandu.blade.php`
- [ ] Update `resources/views/admin/kesehatan/pendataan/posyandu-form.blade.php`
- [ ] Update `resources/views/admin/kesehatan/pendataan/posyandu-show.blade.php`
- [ ] Update `resources/views/admin/kesehatan/pendataan/kia.blade.php`
- [ ] Update `resources/views/admin/kesehatan/pendataan/kia-form.blade.php`
- [ ] Update `resources/views/admin/kesehatan/pendataan/kia-show.blade.php`

### 3. Update Pemantauan Views
- [ ] Update `resources/views/admin/kesehatan/pemantauan/index.blade.php`
- [ ] Update `resources/views/admin/kesehatan/pemantauan/rekap-form.blade.php`

### 4. Update Vaksin Views
- [ ] Update `resources/views/admin/kesehatan/vaksin/index.blade.php`
- [ ] Update `resources/views/admin/kesehatan/vaksin/form.blade.php`
- [ ] Update `resources/views/admin/kesehatan/vaksin/show.blade.php`

### 5. Update Stunting Views
- [ ] Update `resources/views/admin/kesehatan/stunting/posyandu.blade.php`
- [ ] Update `resources/views/admin/kesehatan/stunting/kia.blade.php`
- [ ] Update `resources/views/admin/kesehatan/stunting/pemantauan-bumil.blade.php`
- [ ] Update `resources/views/admin/kesehatan/stunting/pemantauan-anak.blade.php`
- [ ] Update `resources/views/admin/kesehatan/stunting/scorecard.blade.php`

## Implementation Notes
- Start with _nav.blade.php as it's used by all health pages
- Use consistent emerald-600 for primary buttons and active states
- Use teal-600 for secondary actions
- Keep the layout structure the same, only change CSS classes
- Maintain responsive design with Tailwind's responsive prefixes
- Use rounded-lg/rounded-xl for modern look
- Add subtle shadows for depth

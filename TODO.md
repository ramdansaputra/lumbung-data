# TODO - Fix Sidebar Scroll Layout

## Plan:
1. [x] Read and understand the current layout structure
2. [ ] Make sidebar fixed with proper positioning
3. [ ] Add dynamic margin to main content based on sidebar state
4. [ ] Make header fixed at top
5. [ ] Add padding-top to content area for fixed header

## Changes to admin.blade.php:
- Change sidebar from flex item to fixed position with h-screen
- Add dynamic left margin to main content (ml-72 when open, ml-20 when collapsed)
- Make header fixed at top with z-index
- Add pt- to content area to account for fixed header

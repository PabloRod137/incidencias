<div class="overflow-x-auto border border-slate-200 rounded-xl shadow-sm">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-alpe-blue/[0.03] border-b border-slate-200">
                {{ $header }}
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 bg-white">
            {{ $slot }}
        </tbody>
    </table>
</div>

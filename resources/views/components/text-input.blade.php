@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900' ,
// 'placeholder'=>'Username'
]) }}>


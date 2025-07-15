<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation example">
  <ul class="flex items-center -space-x-px h-8 text-sm">
    
    <!-- Previous -->
    <?php if ($pager->hasPrevious()) : ?>
    <li>
      <a href="<?= $pager->getPrevious() ?>" class="paginations flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only"><?= lang('Pager.previous') ?></span>
        <svg class="w-2.5 h-2.5 rtl:rotate-180" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/></svg>
      </a>
    </li>
    <?php endif ?>

    <!-- Page Number Links -->
    <?php foreach ($pager->links() as $link): ?>
    <li>
      <a href="<?= $link['uri'] ?>"
         class="paginations flex items-center justify-center px-3 h-8 leading-tight border <?= $link['active'] ? 'text-blue-600 border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 
            'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700'?>">
        <?= $link['title'] ?>
      </a>
    </li>
    <?php endforeach ?>

    <!-- Next -->
    <?php if ($pager->hasNext()) : ?>
    <li>
      <a href="<?= $pager->getNext() ?>" class="paginations flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only"><?= lang('Pager.next') ?></span>
        <svg class="w-2.5 h-2.5 rtl:rotate-180" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
      </a>
    </li>
    <?php endif ?>

  </ul>
</nav>

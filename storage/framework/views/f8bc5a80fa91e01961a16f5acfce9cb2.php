<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Séries','mensagemSucesso' => $mensagemSucesso]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Séries','mensagem-sucesso' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mensagemSucesso)]); ?>
    <a href="<?php echo e(route('series.create')); ?>" class="btn btn-dark mb-2">Adicionar</a>

    <?php if(isset($mensagemSucesso)): ?>
        <div class="alert alert-success">
            <?php echo e($mensagemSucesso); ?>

        </div>
    <?php endif; ?>

    <ul class="list-group">
        <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="<?php echo e(route('seasons.index', $serie->id)); ?>"><?php echo e($serie->nome); ?></a>
                <span class="d-flex">
                    <a href="<?php echo e(route('series.edit', $serie->id)); ?>" class="btn btn-primary btn-sm">E</a>
                <form action="<?php echo e(route('series.destroy', $serie->id)); ?>" method="post" class="ms-2">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
                    </span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\Php\Projetos\controle-series\resources\views/series/index.blade.php ENDPATH**/ ?>
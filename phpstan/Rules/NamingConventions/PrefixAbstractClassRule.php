<?php

declare(strict_types=1);

namespace Lycheeorg\PHPStan\Rules\NamingConventions;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Analyser\Scope;
use PHPStan\Node\InClassNode;
use PHPStan\Rules\Rule;

final class PrefixAbstractClassRule implements Rule
{
    /**
     * @var string
     */
    public const ERROR_MESSAGE = 'Abstract class name "%s" must be prefixed with "Abstract" or "Base"';

    /**
     * @return class-string<Node>
     */
    public function getNodeType(): string
    {
        return InClassNode::class;
    }

    /**
     * @param InClassNode $node
     * @return string[]
     */
    public function processNode(Node $node, Scope $scope): array
    {
        $classReflection = $node->getClassReflection();
        if ($classReflection->isAnonymous()) {
            return [];
        }

        $classLike = $node->getOriginalNode();
        if (! $classLike instanceof Class_) {
            return [];
        }

        if (! $classReflection->isAbstract()) {
            return [];
        }

        if (! $classLike->name instanceof Identifier) {
            return [];
        }

        $shortClassName = $classLike->name->toString();
        if (strncmp($shortClassName, 'Abstract', strlen('Abstract')) === 0) {
            return [];
        }

        if (strncmp($shortClassName, 'Base', strlen('Base')) === 0) {
            return [];
        }

        return [sprintf(self::ERROR_MESSAGE, $shortClassName)];
    }
}
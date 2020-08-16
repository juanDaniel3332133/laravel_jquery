<?php

namespace App\Rules\Category;

use Illuminate\Contracts\Validation\Rule;

use App\Services\Models\CategoryService;

class CheckIfTheCategoryHasAssociatedProducts implements Rule
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $category_id)
    {
        $category = $this->categoryService->find($category_id);

        if ($category->products->isNotEmpty())
            return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Esta categoria tiene productos asociados. Asegurese de que la categoria a eliminar no tenga registros asociados';
    }
}

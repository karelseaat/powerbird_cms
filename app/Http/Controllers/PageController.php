<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'pages' => Page::all(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:pages',
            'content' => 'required|string',
            'published' => 'boolean',
        ]);

        $page = Page::create($validated);

        return response()->json([
            'message' => 'Page created successfully',
            'page' => $page,
        ], 201);
    }

    public function show(Page $page): JsonResponse
    {
        return response()->json(['page' => $page]);
    }

    public function update(Request $request, Page $page): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'slug' => 'string|unique:pages,slug,' . $page->id,
            'content' => 'string',
            'published' => 'boolean',
        ]);

        $page->update($validated);

        return response()->json([
            'message' => 'Page updated successfully',
            'page' => $page,
        ]);
    }

    public function destroy(Page $page): JsonResponse
    {
        $page->delete();

        return response()->json([
            'message' => 'Page deleted successfully',
        ]);
    }

    public function published(): JsonResponse
    {
        return response()->json([
            'pages' => Page::where('published', true)->get(),
        ]);
    }
}
